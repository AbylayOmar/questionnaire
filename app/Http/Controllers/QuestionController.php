<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Respondent;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class QuestionController extends Controller
{
    /*
        Stores all questions with answers in cache.
        There are setted oberver that update cache when new question or answer created.
    */
    public function index(): View
    {
        $questions = cache()->remember('questions', 60 * 60 * 24, function () {
            return Question::get()->load('answers');
        });

        return view('index', compact('questions'));
    }

    /*
        Save the response from questionnaire. If user did not provide name, we will save it as anonymus.
        Request has tree like answers parameter. The answers array format:
            [
                question_id => answer_id,
                question_id => [ 0 => "Handwrite response"]
            ]
    */
    public function store(Request $request)
    {
        $respondent = Respondent::create([
            'name' => 'anonym',
        ]);

        if ($request->name != null) {
            $respondent->name = $request->name;
            $respondent->save();
        }

        foreach ($request->answers as $question_id => $answer_id) {
            $response = Response::create([
                'respondent_id' => $respondent->id,
                'question_id' => $question_id,
            ]);

            if (is_array($answer_id)) {
                $response->answer = $answer_id[0];
            } else {
                $response->answer_id = $answer_id;
            }
            $response->save();
        }

        return redirect()->back();
    }
}

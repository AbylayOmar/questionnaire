<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResponseRequest;
use App\Models\Question;
use App\Models\Response;
use App\Services\StoreResponseService;
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
        Stores new response
    */
    public function store(ResponseRequest $request, StoreResponseService $service)
    {
        $response = $service->handle($request);

        return redirect()->back();
    }
}

<?php

namespace App\Services;

use App\Http\Requests\ResponseRequest;
use App\Models\Respondent;
use App\Models\Response;

class StoreResponseService
{
    /*
       Save the response from questionnaire. If user did not provide name, we will save it as anonymus.
       Request has tree like answers parameter. The answers array format:
           [
               question_id => answer_id,
               question_id => [ 0 => "Handwrite response"]
           ]
    */
    public function handle(ResponseRequest $request): Response
    {
        $respondent = Respondent::create([
            'name' => 'anonym',
        ]);

        if ($request->name != null) {
            $respondent->name = $request->name;
            $respondent->save();
        }

        foreach ($request->answers as $question_id => $answers) {
            $response = Response::create([
                'respondent_id' => $respondent->id,
                'question_id' => $question_id,
            ]);

            foreach ($answers as $id => $value) {
                if (is_array($value) && $value[0] != null) {
                    $response->answer = $value[0];
                    break;
                } elseif (!is_array($value) && $value != null) {
                    $response->answer_id = $value;
                    break;
                }
            }
            $response->save();
        }

        return $response;
    }
}

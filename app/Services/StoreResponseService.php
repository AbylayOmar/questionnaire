<?php

namespace App\Services;

use App\Http\Requests\ResponseRequest;
use App\Models\Respondent;
use App\Models\Response;

class StoreResponseService
{
    public function handle(ResponseRequest $request): Response
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

        return $response;
    }
}

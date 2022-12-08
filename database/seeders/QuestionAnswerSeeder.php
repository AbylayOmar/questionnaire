<?php

namespace Database\Seeders;

use App\Models\QuestionAnswer;
use Illuminate\Database\Seeder;

class QuestionAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 15; ++$i) {
            for ($j = 0; $j < rand(2, 5); ++$j) {
                QuestionAnswer::create([
                    'question_id' => $i,
                    'answer_id' => rand(1, 60),
                ]);
            }
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*
        // \App\Models\User::factory(10)->create();
        \App\Models\Question::factory(3)->create();
        \App\Models\Answer::factory(60)->create();
        */
        $this->call([
            QuestionAnswerSeeder::class,
        ]);
    }
}

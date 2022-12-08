<?php

namespace App\Observers;

use App\Models\Question;

class QuestionOberver
{
    /**
     * Handle the Question "created" event.
     *
     * @return void
     */
    public function created(Question $question)
    {
        cache()->forget('questions');
    }

    /**
     * Handle the Question "updated" event.
     *
     * @return void
     */
    public function updated(Question $question)
    {
    }

    /**
     * Handle the Question "deleted" event.
     *
     * @return void
     */
    public function deleted(Question $question)
    {
    }

    /**
     * Handle the Question "restored" event.
     *
     * @return void
     */
    public function restored(Question $question)
    {
    }

    /**
     * Handle the Question "force deleted" event.
     *
     * @return void
     */
    public function forceDeleted(Question $question)
    {
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class QuizQuestion extends Pivot
{
    public $incrementing = true;
    public $table = "quiz_questions";

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}

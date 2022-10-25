<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\QuizQuestion;
use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Support\Facades\Log;


class AnswerController extends Controller
{
    public function __invoke(Quiz $quiz, Question $question)
    {
        $quiz_question = QuizQuestion::where('quiz_id', $quiz->id)->where('question_id', $question->id)->pluck('id');
        Answer::updateOrCreate(['quiz_question_id' => $quiz_question[0]],['value' => request('answer')]);
    }
}

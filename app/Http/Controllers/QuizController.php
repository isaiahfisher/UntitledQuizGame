<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizQuestion;

class QuizController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        $questions = Question::inRandomOrder()->limit(10)->get();

        $totalPossiblePoints = 0;
        foreach ($questions as $question)
        {
            $totalPossiblePoints += $question->points;
        }

        $quiz = Quiz::firstOrCreate([
            'user_id' => $user->id,
            'total_possible_points' => $totalPossiblePoints,
        ]); 

        $quiz->questions()->attach($questions->pluck('id'));

        dd($quiz);

        //return view with quiz  return('take-quiz', ['quiz' => $quiz]);
    }
}

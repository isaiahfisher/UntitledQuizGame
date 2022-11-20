<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Stat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class Stats extends Controller
{
    

    public function __invoke(){
        $user=Auth::user();
        $stats=$user->stat()->get()[0];
        $numQuizzes=$stats->total_num_quizzes;
        $earnedPoints=$stats->total_earned_points;
        $pointsPossible=$stats->total_points_possible;
        $average = $earnedPoints/$pointsPossible;

        return Inertia::render('Account',[
            "numQuizzes"=>$numQuizzes,
            "earnedPoints"=>$earnedPoints,
            "pointsPossible"=>$pointsPossible,
            "average"=>$average
        ]);
    }

}

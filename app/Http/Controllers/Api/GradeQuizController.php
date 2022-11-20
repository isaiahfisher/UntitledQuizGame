<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Stat;


class GradeQuizController extends Controller
{
    public function __invoke(Quiz $quiz)
    {
        $quiz->earned_points = request('earned_points');
        $quiz->save();
        $stat=Stat::firstOrNew([
            'user_id' => $quiz->user_id
        ]);
        $stat->total_num_quizzes++;
        $stat->total_points_possible+=$quiz->total_possible_points;
        $stat->total_earned_points+=request('earned_points');
        $stat->save();

    }
}

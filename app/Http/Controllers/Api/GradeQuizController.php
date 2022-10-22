<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use Illuminate\Support\Facades\Log;

class GradeQuizController extends Controller
{
    public function __invoke(Quiz $quiz)
    {
        $quiz->earned_points = request('earned_points');
        $quiz->save();
    }
}

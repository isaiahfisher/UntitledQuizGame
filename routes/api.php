<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AnswerController;
use App\Http\Controllers\Api\GradeQuizController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('quiz')->name('quizzes.')->group(function () {
    Route::post('{quiz}', GradeQuizController::class);
    Route::post('{quiz}/question/{question}/answer', AnswerController::class);
});

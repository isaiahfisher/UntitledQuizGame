<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionUploadController;
//use App\Http\Controllers\AccountController;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Homepage', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth','verified'])->name('dashboard');

Route::get('/quiz', [QuizController::class, 'create'])->middleware(['auth','verified'])->name('generate-quiz');

Route::get('/account', function(){
    return Inertia::render('Account');
})->middleware(['auth','verified'])->name('account');

Route::get('/question/create', function(){
    return Inertia::render('CreateQuestion');
})->middleware(['auth','verified'])->name('create-question');

Route::post('/question/store', QuestionUploadController::class)->middleware(['auth','verified'])->name('store-question');

require __DIR__.'/auth.php';

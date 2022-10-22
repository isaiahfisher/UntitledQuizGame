<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
class QuestionUploadController extends Controller
{
    public function __invoke(){

        $user = Auth::user();
        $question = new Question;
        
        $question->value = request('question');
        $question->correct_answer = request('answer');
        $question->category="t/f";
        $question->type="t/f";
        $question->points=request('points');
        $question->uploader=$user->id;
        $question->save();
    }
}

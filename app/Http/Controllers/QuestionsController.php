<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Question;

class QuestionsController extends Controller
{

    /**
     * Show the form for creating a new Question.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render(
            'Questions/Create'
        );
    }

}
<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Question;

class QuestionsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();

        return Inertia::render(
            'Questions/Index',
            [
                'questions' => $questions
            ]
        );
    }
    
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'value' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'points' => 'required',
        ]);
        Question::create([
            'value' => $request->question,
            'category' => $request->category,
            'type' => $request->type,
            'points' => $request->points
            
        ]);
        sleep(1);

        return redirect()->route('questions.index')->with('message', 'Question Created Successfully');
    }

}
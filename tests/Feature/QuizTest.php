<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\User;
use App\Providers\RouteServiceProvider;

class QuizTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_quiz_can_be_rendered()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/quiz');

        $response->assertStatus(200);
    }

    public function test_quiz_questions_loaded() 
    {
        $user = User::factory()->create();
        $quiz = Quiz::factory()->create();
        
        $response = $this->actingAs($user)->post('/quiz', [
        ]);
        
        $response->assertStatus(200);
    }
}

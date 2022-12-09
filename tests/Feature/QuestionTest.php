<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;
use App\Providers\RouteServiceProvider;

class QuestionTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_question_can_be_rendered()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/question/create');

        $response->assertStatus(200);
    }

    public function test_new_questions_can_be_created()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/confirm-password', ['password' => 'password']);

        $response = $this->actingAs($user)->post('/question/store', [
            'question' => 'This is a test question',
            'answer' => 'Goodluck',
            'points' => '1'
        ]);

        $response->assertStatus(200);
    }
}

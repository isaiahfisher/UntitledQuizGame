<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;
use App\Providers\RouteServiceProvider;

class StatsTest extends TestCase
{
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
}

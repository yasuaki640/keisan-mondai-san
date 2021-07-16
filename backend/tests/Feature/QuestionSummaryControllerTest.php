<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuestionSummaryControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_success()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->postJson('api/question-summaries', [
                'operator' => 'add',
                'num_of_questions' => 10
            ]);

        $response->assertCreated();
        $this->assertDatabaseHas('question_summaries', [
            'user_id' => $user->id,
            'operator' => 'add',
            'num_of_questions' => 10
        ]);
    }

    public function test_show_fail_not_existing_id()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->getJson('api/question-summaries/9999999');

        $response->assertNotFound();
    }
}

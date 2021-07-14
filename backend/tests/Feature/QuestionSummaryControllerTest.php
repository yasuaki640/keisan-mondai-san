<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuestionSummaryControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->postJson('api/question-summaries', [
                'operator' => 'add',
                'num_of_questions' => 10
            ]);

        $response->assertCreated();
        $this->assertDatabaseHas('question_summaries', [
            'operator' => 'add',
            'num_of_questions' => 10
        ]);
    }
}

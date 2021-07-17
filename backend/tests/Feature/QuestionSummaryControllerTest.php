<?php

namespace Tests\Feature;

use App\Models\QuestionSummary;
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

    public function test_show_success()
    {
        $user = User::factory()->create();

        $questionSummary = QuestionSummary::factory()->create();

        $response = $this->actingAs($user)
            ->getJson('api/question-summaries/' . $questionSummary->id);

        $response->assertJsonStructure([
            'id',
            'user_id',
            'num_of_questions',
            'operator',
            'answer_start_at',
            'answer_end_at',
            'created_at',
            'updated_at',
        ]);
        $response->assertJson([
            'id' => $questionSummary->id,
            'user_id' => $questionSummary->user_id,
            'num_of_questions' => $questionSummary->num_of_questions,
            'operator' => $questionSummary->operator,
        ]);
    }
}

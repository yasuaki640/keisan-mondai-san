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
        $user = User::factory()
            ->has(QuestionSummary::factory()->count(1), 'question_summaries')
            ->create();

        $questionSummary = $user->question_summaries;

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

    public function test_index_success()
    {
        $user = User::factory()
            ->has(QuestionSummary::factory()->count(3), 'question_summaries')
            ->create();

        $response = $this->actingAs($user)
            ->getJson('api/question-summaries');

        $response->assertOk();
        $response->assertJson([
            [
                'id' => $user->question_summaries[0]->id,
                'user_id' => $user->question_summaries[0]->user_id,
                'num_of_questions' => $user->question_summaries[0]->num_of_questions,
                'operator' => $user->question_summaries[0]->operator,
            ], [
                'id' => $user->question_summaries[1]->id,
                'user_id' => $user->question_summaries[1]->user_id,
                'num_of_questions' => $user->question_summaries[1]->num_of_questions,
                'operator' => $user->question_summaries[1]->operator,
            ], [
                'id' => $user->question_summaries[2]->id,
                'user_id' => $user->question_summaries[2]->user_id,
                'num_of_questions' => $user->question_summaries[2]->num_of_questions,
                'operator' => $user->question_summaries[2]->operator,
            ]
        ]);
    }
}

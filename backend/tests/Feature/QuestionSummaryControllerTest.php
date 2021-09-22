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
        /** @var User $user */
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
        /** @var User $user */
        $user = User::factory()->create();

        /** @var QuestionSummary $questionSummary */
        $questionSummary = QuestionSummary::factory()->create([
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)
            ->getJson('api/question-summaries/' . $questionSummary->id);

        $response
            ->assertOk()
            ->assertJsonStructure([
                'id',
                'user_id',
                'num_of_questions',
                'operator',
                'answer_start_at',
                'answer_end_at',
                'created_at',
                'updated_at',
            ])
            ->assertJson([
                'id' => $questionSummary->id,
                'user_id' => $questionSummary->user_id,
                'num_of_questions' => $questionSummary->num_of_questions,
                'operator' => $questionSummary->operator,
            ]);
    }

    public function test_index_success()
    {
        /** @var User $user */
        $user = User::factory()
            ->has(QuestionSummary::factory()->count(3), 'question_summaries')
            ->create();

        $response = $this->actingAs($user)
            ->getJson('api/question-summaries');

        $questionSummaries = $user->question_summaries;

        $response
            ->assertOk()
            ->assertJson([
                [
                    'id' => $questionSummaries[0]->id,
                    'user_id' => $questionSummaries[0]->user_id,
                    'num_of_questions' => $questionSummaries[0]->num_of_questions,
                    'operator' => $questionSummaries[0]->operator,
                ], [
                    'id' => $questionSummaries[1]->id,
                    'user_id' => $questionSummaries[1]->user_id,
                    'num_of_questions' => $questionSummaries[1]->num_of_questions,
                    'operator' => $questionSummaries[1]->operator,
                ], [
                    'id' => $questionSummaries[2]->id,
                    'user_id' => $questionSummaries[2]->user_id,
                    'num_of_questions' => $questionSummaries[2]->num_of_questions,
                    'operator' => $questionSummaries[2]->operator,
                ]
            ]);
    }
}

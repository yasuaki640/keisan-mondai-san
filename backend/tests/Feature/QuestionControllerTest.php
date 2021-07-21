<?php

namespace Tests\Feature;

use App\Models\QuestionSummary;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuestionControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_success()
    {
        $user = User::factory()->create();
        $questionSummary = QuestionSummary::factory()->create();

        $response = $this->actingAs($user)
            ->postJson('api/questions', [
                'question_summary_id' => $questionSummary->id
            ]);

        $response->assertCreated();
    }
}

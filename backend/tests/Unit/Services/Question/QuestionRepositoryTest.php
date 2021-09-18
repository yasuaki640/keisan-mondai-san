<?php


namespace Tests\Unit\Services\Question;

use App\Models\Question;
use App\Service\Question\QuestionRepository;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuestionRepositoryTest extends TestCase
{
    use RefreshDatabase;

    private QuestionRepository $repository;

    protected function setUp(): void
    {
        $this->repository = new QuestionRepository();
        parent::setUp();
    }

    public function test_bulkInsert()
    {
        Carbon::setTestNow(new Carbon('2021-09-18 09:59:59'));

        $this->repository->bulkInsert([
            [
                'expression' => '1 + 1',
                'answer' => 2,
                'has_decimal_point' => false,
                'operator' => Question::OPERATOR_ADD,
                'has_minus' => false
            ],
            [
                'expression' => '2 - 5',
                'answer' => -3,
                'has_decimal_point' => false,
                'operator' => Question::OPERATOR_SUB,
                'has_minus' => true
            ],
            [
                'expression' => '1.2 × 4',
                'answer' => 4.8,
                'has_decimal_point' => true,
                'operator' => Question::OPERATOR_MULTI,
                'has_minus' => false
            ]
        ]);

        $this
            ->assertDatabaseHas('questions', [
                'expression' => '1 + 1',
                'answer' => 2,
                'has_decimal_point' => false,
                'operator' => Question::OPERATOR_ADD,
                'has_minus' => false,
                'created_at' => now(),
                'updated_at' => now()
            ])
            ->assertDatabaseHas('questions', [
                'expression' => '2 - 5',
                'answer' => -3,
                'has_decimal_point' => false,
                'operator' => Question::OPERATOR_SUB,
                'has_minus' => true,
                'created_at' => now(),
                'updated_at' => now()
            ])
            ->assertDatabaseHas('questions', [
                'expression' => '1.2 × 4',
                'answer' => 4.8,
                'has_decimal_point' => true,
                'operator' => Question::OPERATOR_MULTI,
                'has_minus' => false,
                'created_at' => now(),
                'updated_at' => now()
            ]);
    }
}

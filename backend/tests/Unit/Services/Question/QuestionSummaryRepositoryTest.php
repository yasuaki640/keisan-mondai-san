<?php

namespace Tests\Unit\Services\Question;

use App\Models\QuestionSummary;
use App\Service\QuestionSummary\QuestionSummaryRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuestionSummaryRepositoryTest extends TestCase
{
    use RefreshDatabase;

    private QuestionSummaryRepository $repository;

    protected function setUp(): void
    {
        $this->repository = new QuestionSummaryRepository();
        parent::setUp();
    }

    public function test_findById()
    {
        /** @var QuestionSummary $expected */
        $expected = QuestionSummary::factory()->create();

        $this->actingAs($expected->user);

        $actual = $this->repository->findById($expected->id);

        $this->assertTrue($expected->is($actual));
    }

}

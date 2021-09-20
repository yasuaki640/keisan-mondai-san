<?php

namespace Tests\Unit\Services\Question\Generator;

use App\Models\Question;
use App\Models\QuestionSummary;
use App\Service\Question\Generator\AddGenerator;
use App\Service\Question\QuestionRepository;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class AddGeneratorTest
 * @package Tests\Unit\Services\Question\Generator
 */
class AddGeneratorTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var AddGenerator
     */
    private AddGenerator $generator;

    protected function setUp(): void
    {
        $repository = \Mockery::mock(QuestionRepository::class);

        $this->generator = new AddGenerator($repository);

        parent::setUp();
    }

    public function test_makeQuestion()
    {
        $actual = $this->generator->makeQuestion();

        $this->assertInstanceOf(Question::class, $actual);
        $this->assertSame(Question::OPERATOR_ADD, $actual->operator);
    }

    public function test_makeQuestion_can_make_correct_answer_from_expression()
    {
        $question = $this->generator->makeQuestion();

        [$l, $operator, $r] = explode(' ', $question->expression);

        $this->assertSame($question->answer, intval($l) + intval($r));
        $this->assertSame('+', $operator);
    }

    /**
     * @throws Exception
     */
    public function test_execute()
    {
        $questionSummary = QuestionSummary::factory()->incomplete()->make([
            'operator' => QuestionSummary::OPERATOR_ADD,
            'num_of_questions' => 10
        ]);

        $actual = $this->generator->execute($questionSummary);

        $this->assertCount(10, $actual);
        $this->assertContainsOnlyInstancesOf(Question::class, $actual);
    }
}

<?php

namespace Tests\Unit\Services\Question\Generator;

use App\Models\Question;
use App\Service\Question\Generator\DivideGenerator;
use App\Service\Question\QuestionRepository;
use Tests\TestCase;


/**
 * Class DivideGeneratorTest
 * @package Tests\Unit\Services\Question\Generator
 */
class DivideGeneratorTest extends TestCase
{
    /**
     * @var DivideGenerator
     */
    private DivideGenerator $generator;

    protected function setUp(): void
    {
        $repository = \Mockery::mock(QuestionRepository::class);

        $this->generator = new DivideGenerator($repository);

        parent::setUp();
    }

    /**
     * @throws \Exception
     */
    public function test_makeQuestion()
    {
        $actual = $this->generator->makeQuestion();

        $this->assertInstanceOf(Question::class, $actual);
        $this->assertSame(Question::OPERATOR_DIVIDE, $actual->operator);
    }

    public function test_makeQuestion_can_make_correct_answer_from_expression()
    {
        $question = $this->generator->makeQuestion();

        [$l, $operator, $r] = explode(' ', $question->expression);

        $this->assertSame($question->answer, intval($l) / intval($r));
        $this->assertSame('÷', $operator);
    }
}

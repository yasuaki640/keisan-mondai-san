<?php
declare(strict_types=1);

namespace App\Service\Question\Generator\GenerartorStarter;


use App\Models\QuestionSummary;
use App\Service\Question\Generator\AddGenerator;
use App\Service\Question\Generator\DivideGenerator;
use App\Service\Question\Generator\Generator;
use App\Service\Question\Generator\MultiGenerator;
use App\Service\Question\Generator\SubGenerator;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class StarterImpl
 * @package App\Service\Question\Generator\Starter
 */
class GeneratorStarterImpl implements GeneratorStarter
{
    /**
     * @var Generator
     */
    private Generator $generator;

    /**
     * @var AddGenerator
     */
    private AddGenerator $addGenerator;

    /**
     * @var SubGenerator
     */
    private SubGenerator $subGenerator;

    /**
     * @var MultiGenerator
     */
    private MultiGenerator $multiGenerator;

    /**
     * @var DivideGenerator
     */
    private DivideGenerator $divideGenerator;

    /**
     * StarterImpl constructor.
     */
    public function __construct(
        AddGenerator $addGenerator,
        SubGenerator $subGenerator,
        MultiGenerator $multiGenerator,
        DivideGenerator $divideGenerator,
    )
    {
        $this->addGenerator = $addGenerator;
        $this->subGenerator = $subGenerator;
        $this->multiGenerator = $multiGenerator;
        $this->divideGenerator = $divideGenerator;
    }

    /**
     * @param QuestionSummary $questionSummary
     * @return Collection
     */
    public function generateQuestions(QuestionSummary $questionSummary): Collection
    {
        $this->generator = $this->getGenerator($questionSummary->operator);

        return $this->generator->generate($questionSummary);
    }

    /**
     * @param string $operatorType
     * @return Generator
     */
    public function getGenerator(string $operatorType): Generator
    {
        return match ($operatorType) {
            QuestionSummary::OPERATOR_ADD => $this->addGenerator,
            QuestionSummary::OPERATOR_SUB => $this->subGenerator,
            QuestionSummary::OPERATOR_MULTI => $this->multiGenerator,
            QuestionSummary::OPERATOR_DIVIDE => $this->divideGenerator,
        };
    }
}

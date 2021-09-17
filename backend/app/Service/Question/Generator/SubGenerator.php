<?php
declare(strict_types=1);

namespace App\Service\Question\Generator;


use App\Models\Question;
use App\Models\QuestionSummary;
use App\Service\Question\QuestionRepository;
use Exception;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class SubGenerator
 * @package App\Service\Question\Generator
 */
class SubGenerator implements Generator
{
    /**
     * @var QuestionRepository
     */
    private QuestionRepository $questionRepository;

    /**
     * AddGenerator constructor.
     * @param QuestionRepository $questionRepository
     */
    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    /**
     * @inheritDoc
     * @return Question[]
     * @throws Exception
     */
    public function execute(QuestionSummary $questionSummary): Collection
    {
        $questions = [];
        for ($i = 1; $i, $questionSummary->num_of_questions; $i++) {
            $questions[] = $this->makeQuestion();
        }

        return $questions;
    }

    /**
     * Generate Sub questions.
     * By default,
     * it creates single digit subtractions that has no minus answer.
     *
     * @return Question
     * @throws Exception
     */
    public function makeQuestion(): Question
    {
        $arr = [random_int(1, 9), random_int(1, 9)];
        [$l, $r] = rsort($arr);

        return new Question([
            'expression' => "{$l} - {$r}",
            'answer' => $l - $r,
            'operator' => Question::OPERATOR_SUB
        ]);
    }
}

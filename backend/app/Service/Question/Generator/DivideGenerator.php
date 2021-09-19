<?php
declare(strict_types=1);

namespace App\Service\Question\Generator;


use App\Models\Question;
use App\Models\QuestionSummary;
use App\Service\Question\QuestionRepository;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class DivideGenerator implements Generator
{
    /**
     * @var QuestionRepository
     */
    private QuestionRepository $questionRepository;

    /**
     * DivideGenerator constructor.
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
     * Generate Multiplication questions.
     * By default,
     * it creates divisible questions.
     *
     * @return Question
     * @throws Exception
     */
    public function makeQuestion(): Question
    {
        $r = random_int(1, 9);
        $l = $r * ($a = random_int(1, 9));

        return new Question([
            'expression' => "{$l} ÷ {$r}",
            'answer' => $a,
            'operator' => Question::OPERATOR_DIVIDE
        ]);
    }
}

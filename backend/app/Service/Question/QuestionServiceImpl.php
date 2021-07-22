<?php
declare(strict_types=1);

namespace App\Service\Question;


use Illuminate\Database\Eloquent\Collection;

/**
 * Class QuestionServiceImpl
 * @package App\Service\Question
 */
class QuestionServiceImpl implements QuestionService
{
    /**
     * @var QuestionRepository
     */
    private QuestionRepository $repository;


    /**
     * QuestionServiceImpl constructor.
     */
    public function __construct(QuestionRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $questionSummaryId
     * @return array|Collection
     */
    public function storeByQuestionSummaryId(int $questionSummaryId): array|Collection
    {
        return [];
    }
}

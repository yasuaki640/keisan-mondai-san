<?php
declare(strict_types=1);

namespace App\Service\Question;


use App\Service\QuestionSummary\QuestionSummaryRepository;
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
     * @var QuestionSummaryRepository
     */
    private QuestionSummaryRepository $questionSummaryRepository;


    /**
     * QuestionServiceImpl constructor.
     */
    public function __construct(QuestionRepository $repository, QuestionSummaryRepository $questionSummaryRepository)
    {
        $this->repository = $repository;
        $this->questionSummaryRepository = $questionSummaryRepository;
    }

    /**
     * @param int $questionSummaryId
     * @return array|Collection
     */
    public function storeByQuestionSummaryId(int $questionSummaryId): array|Collection
    {
        $this->questionSummaryRepository->findById($questionSummaryId);

        return [];
    }
}

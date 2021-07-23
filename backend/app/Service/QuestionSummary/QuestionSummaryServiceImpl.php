<?php
declare(strict_types=1);

namespace App\Service\QuestionSummary;


use Illuminate\Database\Eloquent\Collection;

/**
 * Class QuestionSummaryServiceImpl
 * @package App\Service\QuestionSummary
 */
class QuestionSummaryServiceImpl implements QuestionSummaryService
{
    /**
     * @var QuestionSummaryRepository
     */
    private QuestionSummaryRepository $repository;

    /**
     * QuestionSummaryServiceImpl constructor.
     * @param QuestionSummaryRepository $repository
     */
    public function __construct(QuestionSummaryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $params
     * @return int
     */
    public function store(array $params): int
    {
        $params = array_merge($params, [
            'user_id' => auth()->id(),
            'answer_start_at' => now()
        ]);

        return $this->repository->store($params);
    }

    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return $this->repository->findAll();
    }
}

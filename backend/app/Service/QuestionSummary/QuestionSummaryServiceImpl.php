<?php


namespace App\Service\QuestionSummary;


use Illuminate\Database\Eloquent\Collection;

class QuestionSummaryServiceImpl implements QuestionSummaryService
{
    private QuestionSummaryRepository $repository;

    public function __construct(QuestionSummaryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(array $params): int
    {
        $params = array_merge($params, [
            'user_id' => auth()->id(),
            'answer_start_at' => now()
        ]);

        return $this->repository->store($params);
    }

    public function index(): Collection
    {
        return $this->repository->findAll();
    }
}

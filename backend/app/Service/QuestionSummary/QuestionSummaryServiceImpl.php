<?php


namespace App\Service\QuestionSummary;


class QuestionSummaryServiceImpl implements QuestionSummaryService
{
    private QuestionSummaryRepository $repository;

    public function __construct(QuestionSummaryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(array $params): int
    {
        return $this->repository->store($params);
    }
}

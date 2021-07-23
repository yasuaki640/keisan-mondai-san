<?php


namespace App\Service\QuestionSummary;


use Illuminate\Database\Eloquent\Collection;

/**
 * Interface QuestionSummaryService
 * @package App\Service\QuestionSummary
 */
interface QuestionSummaryService
{
    /**
     * @param array $params
     * @return int
     */
    public function store(array $params): int;

    /**
     * @return Collection
     */
    public function index(): Collection;
}

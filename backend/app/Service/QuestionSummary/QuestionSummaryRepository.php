<?php


namespace App\Service\QuestionSummary;


use App\Models\QuestionSummary;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class QuestionSummaryRepository
 * @package App\Service\QuestionSummary
 */
class QuestionSummaryRepository
{

    /**
     * @param array $params
     * @return int
     */
    public function store(array $params): int
    {
        return QuestionSummary::create($params)->id;
    }

    /**
     * @return Collection|array
     */
    public function findAll(): Collection|array
    {
        return QuestionSummary::all();
    }
}

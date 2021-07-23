<?php
declare(strict_types=1);

namespace App\Service\QuestionSummary;


use App\Models\QuestionSummary;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class QuestionSummaryRepository
 * @package App\Service\QuestionSummary
 */
class QuestionSummaryRepository
{
    /**
     * @param int $questionSummaryId
     * @return QuestionSummary
     */
    public function findById(int $questionSummaryId): QuestionSummary
    {
        return QuestionSummary::findOrFail($questionSummaryId);
    }

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

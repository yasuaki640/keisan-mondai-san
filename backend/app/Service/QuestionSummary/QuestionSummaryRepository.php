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
     * Find question summary by id.
     * If summary that has given id is not found,
     * This function returns Exception
     *
     * @param int $questionSummaryId
     * @return QuestionSummary
     */
    public function findById(int $questionSummaryId): QuestionSummary
    {
        return QuestionSummary::findOrFail($questionSummaryId);
    }

    /**
     * Persist question summary.
     *
     * @param array $params
     * @return int
     */
    public function store(array $params): int
    {
        return QuestionSummary::create($params)->id;
    }

    /**
     * Find all question summaries.
     *
     * @return Collection|array
     */
    public function findAll(): Collection|array
    {
        return QuestionSummary::all();
    }
}

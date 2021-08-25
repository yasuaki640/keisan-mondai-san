<?php


namespace App\Service\Question;


use Illuminate\Database\Eloquent\Collection;

/**
 * Interface QuestionService
 * @package App\Service\Question
 */
interface QuestionService
{
    /**
     * jjj
     * @param int $questionSummaryId
     * @return array|Collection
     */
    public function storeByQuestionSummaryId(int $questionSummaryId): array|Collection;
}

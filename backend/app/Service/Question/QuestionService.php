<?php


namespace App\Service\Question;


use Illuminate\Database\Eloquent\Collection;

interface QuestionService
{
    public function storeByQuestionSummaryId(int $questionSummaryId): array|Collection;
}

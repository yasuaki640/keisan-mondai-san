<?php
declare(strict_types=1);

namespace App\Service\Question;


use Illuminate\Database\Eloquent\Collection;

class QuestionServiceImpl implements QuestionService
{

    public function storeByQuestionSummaryId(int $questionSummaryId): array|Collection
    {
        return [];
    }
}

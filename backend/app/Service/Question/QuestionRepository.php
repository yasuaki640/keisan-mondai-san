<?php
declare(strict_types=1);

namespace App\Service\Question;


use App\Models\Question;

/**
 * Class QuestionRepository
 * @package App\Service\Question
 */
class QuestionRepository
{
    /**
     * @param array $array
     * @return void
     */
    public function bulkInsert(array $array): void
    {
        Question::upsert($array, null);
    }
}

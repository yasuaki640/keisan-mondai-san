<?php
declare(strict_types=1);

namespace App\Service\Question\Generator;


use App\Models\Question;
use App\Models\QuestionSummary;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface QuestionGenerator
 * @package App\Service\Question\Generator
 */
interface Generator
{
    /**
     * @param QuestionSummary $questionSummary
     * @return Collection
     */
    public function execute(QuestionSummary $questionSummary): Collection;

    /**
     * @return Question
     */
    public function makeQuestion(): Question;
}

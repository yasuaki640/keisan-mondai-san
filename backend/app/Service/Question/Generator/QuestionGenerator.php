<?php


namespace App\Service\Question\Generator;


use App\Models\QuestionSummary;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface QuestionGenerator
 * @package App\Service\Question\Generator
 */
interface QuestionGenerator
{
    /**
     * @param QuestionSummary $questionSummary
     * @return Collection
     */
    public function generate(QuestionSummary $questionSummary): Collection;
}

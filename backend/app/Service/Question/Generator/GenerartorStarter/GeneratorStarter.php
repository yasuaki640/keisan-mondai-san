<?php
declare(strict_types=1);

namespace App\Service\Question\Generator\GenerartorStarter;


use App\Models\QuestionSummary;
use Illuminate\Database\Eloquent\Collection;


/**
 * Interface GeneratorStarter
 * @package App\Service\Question\Generator\GenerartorStarter
 */
interface GeneratorStarter
{
    /**
     * @param QuestionSummary $questionSummary
     * @return Collection
     */
    public function generateQuestions(QuestionSummary $questionSummary): Collection;
}

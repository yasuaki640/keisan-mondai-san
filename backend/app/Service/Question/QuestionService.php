<?php


namespace App\Service\Question;


use App\Models\QuestionSummary;
use Illuminate\Database\Eloquent\Collection;

interface QuestionService
{
    public function generate(QuestionSummary $questionSummary): array|Collection;
}

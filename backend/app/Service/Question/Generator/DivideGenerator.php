<?php
declare(strict_types=1);

namespace App\Service\Question\Generator;


use App\Models\Question;
use App\Models\QuestionSummary;
use Illuminate\Database\Eloquent\Collection;

class DivideGenerator implements Generator
{

    public function execute(QuestionSummary $questionSummary): Collection
    {
        return new Collection();
    }

    public function makeQuestion(): Question
    {
        return new Question();
    }
}

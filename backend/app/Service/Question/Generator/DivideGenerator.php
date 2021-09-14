<?php


namespace App\Service\Question\Generator;


use App\Models\QuestionSummary;
use Illuminate\Database\Eloquent\Collection;

class DivideGenerator implements Generator
{

    public function generate(QuestionSummary $questionSummary): Collection
    {
        return new Collection();
    }
}

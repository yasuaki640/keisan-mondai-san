<?php


namespace App\Service\Question\Generator;


use App\Models\QuestionSummary;
use Illuminate\Database\Eloquent\Collection;

class SubGenerator implements Generator
{

    /**
     * @inheritDoc
     */
    public function generate(QuestionSummary $questionSummary): Collection
    {
        // TODO: Implement generate() method.
    }
}
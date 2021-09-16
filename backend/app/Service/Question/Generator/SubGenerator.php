<?php
declare(strict_types=1);

namespace App\Service\Question\Generator;


use App\Models\QuestionSummary;
use Illuminate\Database\Eloquent\Collection;

class SubGenerator implements Generator
{

    /**
     * @inheritDoc
     */
    public function execute(QuestionSummary $questionSummary): Collection
    {
        return new Collection();
    }
}

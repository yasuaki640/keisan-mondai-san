<?php
declare(strict_types=1);

namespace App\Service\Question\Generator;


use App\Models\QuestionSummary;
use Illuminate\Database\Eloquent\Collection;

class AddGenerator implements Generator
{

    /**
     * @inheritDoc
     */
    public function generate(QuestionSummary $questionSummary): Collection
    {
        return new Collection();
    }
}

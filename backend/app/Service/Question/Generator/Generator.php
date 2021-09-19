<?php
declare(strict_types=1);

namespace App\Service\Question\Generator;


use App\Models\Question;
use App\Models\QuestionSummary;
use App\Service\Question\QuestionRepository;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface QuestionGenerator
 * @package App\Service\Question\Generator
 */
interface Generator
{
    /**
     * Generator constructor.
     * @param QuestionRepository $questionRepository
     */
    public function __construct(QuestionRepository $questionRepository);

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

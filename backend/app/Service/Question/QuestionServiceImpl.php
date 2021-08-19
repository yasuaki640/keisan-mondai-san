<?php
declare(strict_types=1);

namespace App\Service\Question;


use App\Models\QuestionSummary;
use App\Service\Question\Generator\Generator;
use App\Service\QuestionSummary\QuestionSummaryRepository;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class QuestionServiceImpl
 * @package App\Service\Question
 */
class QuestionServiceImpl implements QuestionService
{
    /**
     * @var QuestionRepository
     */
    private QuestionRepository $repository;

    /**
     * @var QuestionSummaryRepository
     */
    private QuestionSummaryRepository $questionSummaryRepository;

    /**
     * @var Generator
     */
    private Generator $questionGenerator;

    /**
     * QuestionServiceImpl constructor.
     */
    public function __construct(QuestionRepository $repository, QuestionSummaryRepository $questionSummaryRepository)
    {
        $this->repository = $repository;
        $this->questionSummaryRepository = $questionSummaryRepository;
    }

    /**
     * @param int $questionSummaryId
     * @return array|Collection
     */
    public function storeByQuestionSummaryId(int $questionSummaryId): array|Collection
    {
        $questionSummary = $this->questionSummaryRepository->findById($questionSummaryId);

        $this->generateByQuestionSummary($questionSummary);

        return [];
    }

    private function generateByQuestionSummary(QuestionSummary $questionSummary)
    {
        //演算子を選択する

        //2つの整数をランダムに生成する。
        //回答を計算する

        //上記で生成した問題をDBに永続化する。

        //問題をリターンする。
    }
}

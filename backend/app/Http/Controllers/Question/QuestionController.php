<?php
declare(strict_types=1);

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use App\Http\Requests\Question\StoreByQuestionSummaryIdRequest;
use App\Service\Question\QuestionService;
use App\Service\Question\QuestionServiceImpl;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class QuestionController
 * @package App\Http\Controllers\Question
 */
class QuestionController extends Controller
{
    /**
     * @var QuestionService
     */
    private QuestionService $service;

    /**
     * QuestionController constructor.
     * @param QuestionServiceImpl $service
     */
    public function __construct(QuestionServiceImpl $service)
    {
        $this->service = $service;
    }

    /**
     * Store questions has given question summary id.
     *
     * @param StoreByQuestionSummaryIdRequest $request
     * @return JsonResponse
     */
    public function storeByQuestionSummaryId(StoreByQuestionSummaryIdRequest $request): JsonResponse
    {
        $questionSummaryId = intval($request->input('question_summary_id'));

        $this->service->storeByQuestionSummaryId($questionSummaryId);

        return response()->json([], Response::HTTP_CREATED);
    }

    /**
     * @return JsonResponse
     */
    public function get(): JsonResponse
    {
        return response()->json();
    }
}

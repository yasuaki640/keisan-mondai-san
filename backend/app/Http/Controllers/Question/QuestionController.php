<?php
declare(strict_types=1);

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use App\Http\Requests\Question\StoreByQuestionSummaryIdRequest;
use App\Service\Question\QuestionService;
use App\Service\Question\QuestionServiceImpl;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuestionController extends Controller
{
    private QuestionService $service;

    public function __construct(QuestionServiceImpl $service)
    {
        $this->service = $service;
    }

    public function storeByQuestionSummaryId(StoreByQuestionSummaryIdRequest $request): JsonResponse
    {
        $questionSummaryId = intval($request->input('question_summary_id'));

        $this->service->storeByQuestionSummaryId($questionSummaryId);

        return response()->json([], Response::HTTP_CREATED);
    }

    public function get(): JsonResponse
    {
        return response()->json();
    }
}

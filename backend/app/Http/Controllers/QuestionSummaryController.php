<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionSummary\StoreRequest;
use App\Http\Resources\QuestionSummary\ShowResource;
use App\Models\QuestionSummary;
use App\Service\QuestionSummary\QuestionSummaryService;
use App\Service\QuestionSummary\QuestionSummaryServiceImpl;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class QuestionSummaryController
 * @package App\Http\Controllers
 */
class QuestionSummaryController extends Controller
{
    /**
     * @var QuestionSummaryService
     */
    private QuestionSummaryService $service;

    /**
     * QuestionSummaryController constructor.
     * @param QuestionSummaryServiceImpl $service
     */
    public function __construct(QuestionSummaryServiceImpl $service)
    {
        $this->service = $service;
    }

    /**
     * @param StoreRequest $request
     * @return JsonResponse
     */
    public function store(StoreRequest $request): JsonResponse
    {
        $id = $this->service->store(array_merge($request->validated()));

        return response()->json(['id' => $id], Response::HTTP_CREATED);
    }

    /**
     * @param QuestionSummary $questionSummary
     * @return JsonResponse
     */
    public function show(QuestionSummary $questionSummary): JsonResponse
    {
        return response()->json(new ShowResource($questionSummary));
    }

    public function index(): JsonResponse
    {
        $questionSummaries = $this->service->index();

        return response()->json(ShowResource::collection($questionSummaries));
    }
}

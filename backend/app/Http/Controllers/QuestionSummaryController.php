<?php
declare(strict_types=1);

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
     * Store question summary that has given params.
     *
     * @param StoreRequest $request
     * @return JsonResponse
     */
    public function store(StoreRequest $request): JsonResponse
    {
        $id = $this->service->store($request->validated());

        return response()->json(['id' => $id], Response::HTTP_CREATED);
    }

    /**
     * Show question summary info that has given id.
     *
     * @param QuestionSummary $questionSummary
     * @return JsonResponse
     */
    public function show(QuestionSummary $questionSummary): JsonResponse
    {
        return response()->json(new ShowResource($questionSummary));
    }

    /**
     * List all question summaries.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $questionSummaries = $this->service->index();

        return response()->json(ShowResource::collection($questionSummaries));
    }
}

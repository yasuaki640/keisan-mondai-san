<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionSummary\StoreRequest;
use App\Service\QuestionSummary\QuestionSummaryService;
use App\Service\QuestionSummary\QuestionSummaryServiceImpl;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class QuestionSummaryController extends Controller
{
    private QuestionSummaryService $service;

    public function __construct(QuestionSummaryServiceImpl $service)
    {
        $this->service = $service;
    }

    public function store(StoreRequest $request): JsonResponse
    {
        $req = array_merge($request->validated());

        $id = $this->service->store($req);

        return response()->json(['id' => $id], Response::HTTP_CREATED);
    }
}

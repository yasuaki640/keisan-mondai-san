<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionSummary\StoreRequest;
use App\Models\QuestionSummary;
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
        $id = $this->service->store(array_merge($request->validated()));

        return response()->json(['id' => $id], Response::HTTP_CREATED);
    }

    public function show(QuestionSummary $questionSummary)
    {
        return \response()->json();
    }
}

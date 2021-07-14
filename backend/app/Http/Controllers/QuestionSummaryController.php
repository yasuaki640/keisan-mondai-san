<?php

namespace App\Http\Controllers;

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

    public function store(): JsonResponse
    {

        return response()->json([], Response::HTTP_CREATED);
    }
}

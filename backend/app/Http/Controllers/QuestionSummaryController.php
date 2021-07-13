<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class QuestionSummaryController extends Controller
{
    public function store(): JsonResponse
    {
        return response()->json([], Response::HTTP_CREATED);
    }
}

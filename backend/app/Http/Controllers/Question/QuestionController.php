<?php
declare(strict_types=1);

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use App\Http\Requests\Question\StoreByQuestionSummaryIdRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuestionController extends Controller
{
    public function storeByQuestionSummaryId(StoreByQuestionSummaryIdRequest $request): JsonResponse
    {
        return response()->json([], Response::HTTP_CREATED);
    }

    public function get(): JsonResponse
    {
        return response()->json();
    }
}

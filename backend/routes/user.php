<?php

use App\Http\Controllers\Question\QuestionController;
use App\Http\Controllers\QuestionSummaryController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('users')->group(function () {
    Route::post('', [UserController::class, 'store']);
});

Route::middleware('auth:api')->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('', [UserController::class, 'index']);
        Route::get('me', [UserController::class, 'me']);
        Route::get('{user}', [UserController::class, 'show']);
        Route::put('{user}', [UserController::class, 'update']);
        Route::delete('{user}', [UserController::class, 'destroy']);
    });

    Route::prefix('questions')->group(function () {
        Route::get('', [QuestionController::class, 'show']);
        Route::post('', [QuestionController::class, 'storeByQuestionSummaryId']);
    });

    Route::prefix('question-summaries')->name('question-summaries.')->group(function () {
        Route::get('{questionSummary}', [QuestionSummaryController::class, 'show']);
        Route::post('', [QuestionSummaryController::class, 'store'])->name('store');
        Route::get('', [QuestionSummaryController::class, 'index'])->name('index');
    });
});


<?php


namespace App\Service\QuestionSummary;


use App\Models\QuestionSummary;
use Illuminate\Database\Eloquent\Collection;

class QuestionSummaryRepository
{

    public function store(array $params): int
    {
        return QuestionSummary::create($params)->id;
    }

    public function findAll(): Collection|array
    {
        return QuestionSummary::all();
    }
}

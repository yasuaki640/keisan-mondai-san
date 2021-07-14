<?php


namespace App\Service\QuestionSummary;


use App\Models\QuestionSummary;

class QuestionSummaryRepository
{

    public function store(array $params)
    {
        return QuestionSummary::create($params)->id;
    }
}

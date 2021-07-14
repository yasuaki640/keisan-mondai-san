<?php


namespace App\Service\QuestionSummary;


interface QuestionSummaryService
{
    public function store(array $params): int;
}

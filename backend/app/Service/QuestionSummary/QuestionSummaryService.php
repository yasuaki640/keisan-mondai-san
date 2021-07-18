<?php


namespace App\Service\QuestionSummary;


use Illuminate\Database\Eloquent\Collection;

interface QuestionSummaryService
{
    public function store(array $params): int;

    public function index(): Collection;
}

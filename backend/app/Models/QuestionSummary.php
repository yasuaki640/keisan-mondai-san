<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionSummary extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'answer_start_at',
        'answer_end_at',
    ];

    protected $dates = [
        'answer_start_at',
        'answer_end_at',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionSummary extends Model
{
    use HasFactory, SoftDeletes;

    public const OPERATOR_ADD = 'add';

    public const OPERATOR_SUB = 'sub';

    public const OPERATOR_MULTI = 'multi';

    public const OPERATOR_DIVIDE = 'divide';

    public const OPERATOR_LIST = [
        self::OPERATOR_ADD,
        self::OPERATOR_SUB,
        self::OPERATOR_MULTI,
        self::OPERATOR_DIVIDE
    ];

    protected $fillable = [
        'user_id',
        'num_of_questions',
        'operator',
        'answer_start_at',
        'answer_end_at',
    ];

    protected $dates = [
        'answer_start_at',
        'answer_end_at',
    ];
}

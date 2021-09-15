<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Question
 * @package App\Models
 */
class Question extends Model
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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'expression',
        'answer',
        'has_decimal_point',
        'operator',
        'has_minus'
    ];
}

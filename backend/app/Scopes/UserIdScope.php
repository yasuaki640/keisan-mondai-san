<?php
declare(strict_types=1);

namespace App\Scopes;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

/**
 * Class UserIdScope
 * @package App\Scopes
 */
class UserIdScope implements Scope
{
    /**
     * @param Builder $builder
     * @param Model $model
     */
    public function apply(Builder $builder, Model $model)
    {
        $userId = auth()->id();
        $builder->where('user_id', $userId);
    }
}

<?php
declare(strict_types=1);

namespace App\Service\User;


use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class UserRepository
 * @package App\Service\User
 */
class UserRepository
{
    /**
     * @param array $params
     * @return int
     */
    public function create(array $params): int
    {
        return User::create($params)->id;
    }

    /**
     * @return Collection|array
     */
    public function findAll(): Collection|array
    {
        return User::all();
    }

    /**
     * @param int $id
     * @param array $params
     * @return User
     */
    public function update(int $id, array $params): User
    {
        $user = User::find($id);
        $user->fill($params)->save();

        return $user;
    }

    /**
     * @param int $id
     */
    public function destroy(int $id)
    {
        User::find($id)->delete();
    }
}

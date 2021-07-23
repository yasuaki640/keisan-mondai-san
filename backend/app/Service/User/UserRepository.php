<?php
declare(strict_types=1);

namespace App\Service\User;


use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository
{
    public function create(array $params): int
    {
        return User::create($params)->id;
    }

    public function findAll(): Collection|array
    {
        return User::all();
    }

    public function update(int $id, array $params): User
    {
        $user = User::find($id);
        $user->fill($params)->save();

        return $user;
    }

    public function destroy(int $id)
    {
        User::find($id)->delete();
    }
}

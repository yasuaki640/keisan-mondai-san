<?php


namespace App\Service\User;


use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository
{
    public function create(array $paramas): int
    {
        return User::create($paramas)->id;
    }

    public function findAll(): Collection|array
    {
        return User::all();
    }
}

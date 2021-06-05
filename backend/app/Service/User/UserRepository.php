<?php


namespace App\Service\User;


use App\Models\User;

class UserRepository
{

    public function create(array $paramas): int
    {
        return User::create($paramas)->id;
    }
}

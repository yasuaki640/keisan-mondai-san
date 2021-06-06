<?php
declare(strict_types=1);

namespace App\Service\User;


interface UserService
{
    public function store(array $params): int;
}

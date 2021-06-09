<?php
declare(strict_types=1);

namespace App\Service\User;


use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserService
{
    public function store(array $params): int;

    public function index(): Collection|array;

    public function update(int $id, array $params): User;

    public function destroy(int $id): void;
}

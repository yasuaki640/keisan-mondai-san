<?php
declare(strict_types=1);

namespace App\Service\User;


use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface UserService
 * @package App\Service\User
 */
interface UserService
{
    /**
     * @param array $params
     * @return int
     */
    public function store(array $params): int;

    /**
     * @return Collection|array
     */
    public function index(): Collection|array;

    /**
     * @param int $id
     * @param array $params
     * @return User
     */
    public function update(int $id, array $params): User;

    /**
     * @param int $id
     */
    public function destroy(int $id): void;
}

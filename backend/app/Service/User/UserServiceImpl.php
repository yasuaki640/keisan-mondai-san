<?php
declare(strict_types=1);

namespace App\Service\User;


use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class UserServiceImpl
 * @package App\Service\User
 */
class UserServiceImpl implements UserService
{
    /**
     * @var UserRepository
     */
    private UserRepository $repository;

    /**
     * UserServiceImpl constructor.
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $params
     * @return int
     */
    public function store(array $params): int
    {
        return $this->repository->create($params);
    }

    /**
     * @return Collection|array
     */
    public function index(): Collection|array
    {
        return $this->repository->findAll();
    }

    /**
     * @param int $id
     * @param array $params
     * @return User
     */
    public function update(int $id, array $params): User
    {
        return $this->repository->update($id, $params);
    }

    /**
     * @param int $id
     */
    public function destroy(int $id): void
    {
        $this->repository->destroy($id);
    }
}

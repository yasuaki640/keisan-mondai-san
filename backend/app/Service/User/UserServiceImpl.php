<?php


namespace App\Service\User;


use App\Models\User;
use App\Service\User\UserRepository;
use App\Service\User\UserService;
use Illuminate\Database\Eloquent\Collection;

class UserServiceImpl implements UserService
{
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(array $params): int
    {
        return $this->repository->create($params);
    }

    public function index(): Collection|array
    {
        return $this->repository->findAll();
    }

    public function update(int $id, array $params): User
    {
        return $this->repository->update($id, $params);
    }

    public function destroy(int $id): void
    {
        $this->repository->destroy($id);
    }
}

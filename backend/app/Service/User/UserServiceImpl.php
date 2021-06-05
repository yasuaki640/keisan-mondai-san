<?php


namespace App\Service\User;


use App\Service\User\UserRepository;
use App\Service\User\UserService;

class UserServiceImpl implements UserService
{
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $params): int
    {
        return $this->repository->create($params);
    }
}

<?php

namespace App\Services\User;

use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService
{
    /**
     * @var \App\Repositories\User\UserRepositoryInterface
     */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param int|null $limit
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Pagination\LengthAwarePaginator
     */
    public function getAll(?int $limit): LengthAwarePaginator
    {
        return $this->userRepository->all($limit);
    }

    /**
     * @param array $fields
     *
     * @return \App\Models\User
     */
    public function create(array $fields): User
    {
        return $this->userRepository->create($fields);
    }

    /**
     * @param int $id
     *
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->userRepository->delete($id);
    }
}

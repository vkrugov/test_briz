<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface
{
    /**
     * @param int|null $limit
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|LengthAwarePaginator
     */
    public function all(?int $limit): LengthAwarePaginator;

    /**
     * @param array $fields
     *
     * @return \App\Models\User
     */
    public function create(array $fields): User;

    /**
     * @param int $id
     *
     * @return bool
     */
    public function delete(int $id): bool;
}

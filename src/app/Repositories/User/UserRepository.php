<?php

namespace App\Repositories\User;

use App\Filters\User\NamePhoneFilter;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class UserRepository implements UserRepositoryInterface
{
    const DEFAULT_PAGINATION = 10;

    /**
     * @param int|null $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|LengthAwarePaginator
     */
    public function all(?int $limit): LengthAwarePaginator
    {
        return QueryBuilder::for(new User())
                           ->with(['profile'])
                           ->allowedFilters([
                               AllowedFilter::custom('user_search', new NamePhoneFilter()),
                           ])
                           ->defaultSort('-created_at')
                           ->allowedSorts([
                               'created_at'
                           ])
                           ->paginate($limit ?? self::DEFAULT_PAGINATION);
    }

    /**
     * @param array $fields
     *
     * @return \App\Models\User
     */
    public function create(array $fields): User
    {
        $user = new User();
        $user->save();
        $user->profile()->create($fields);

        return $user->load('profile');
    }

    /**
     * @param int $id
     *
     * @return bool
     */
    public function delete(int $id): bool
    {
        $user = User::find($id);

        return $user->delete();
    }
}

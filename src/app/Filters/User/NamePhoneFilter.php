<?php

namespace App\Filters\User;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class NamePhoneFilter implements Filter
{
    /**
     * @param Builder $query
     * @param         $value
     * @param string  $property
     */
    public function __invoke(Builder $query, $value, string $property)
    {
        $query->whereHas('profile', function (Builder $query) use ($value) {
            $query->where('name', 'like', "%{$value}%")->orWhere('phone', 'like', "%{$value}%");
        });
    }
}

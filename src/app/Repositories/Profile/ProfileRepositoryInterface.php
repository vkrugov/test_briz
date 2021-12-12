<?php

namespace App\Repositories\Profile;

use App\Models\Profile;

interface ProfileRepositoryInterface
{
    /**
     * @param array $fields
     * @param int   $profileId
     *
     * @return \App\Models\Profile
     */
    public function update(array $fields, int $profileId): Profile;
}

<?php

namespace App\Repositories\Profile;

use App\Models\Profile;

class ProfileRepository implements ProfileRepositoryInterface
{
    /**
     * @param array $fields
     * @param int   $profileId
     *
     * @return \App\Models\Profile
     */
    public function update(array $fields, int $profileId): Profile
    {
        $profile = Profile::find($profileId);
        $profile->update($fields);

        return $profile;
    }
}

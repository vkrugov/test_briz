<?php

namespace App\Services\Profile;

use App\Models\Profile;
use App\Repositories\Profile\ProfileRepositoryInterface;

class ProfileService
{
    /**
     * @var \App\Repositories\User\UserRepositoryInterface
     */
    private $profileRepository;

    public function __construct(ProfileRepositoryInterface $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    /**
     * @param array $fields
     * @param int   $profileId
     *
     * @return \App\Models\Profile
     */
    public function update(array $fields, int $profileId): Profile
    {
        return $this->profileRepository->update($fields, $profileId);
    }
}

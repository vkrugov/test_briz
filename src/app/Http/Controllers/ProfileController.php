<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\UpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\Profile\ProfileService;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
    /**
     * @var \App\Services\Profile\ProfileService
     */
    private $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    /**
     * @param \App\Http\Requests\Profile\UpdateRequest $updateRequest
     * @param \App\Models\User                         $user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRequest $updateRequest, User $user): JsonResponse
    {
        $this->profileService->update($updateRequest->all(), $user->profile->id);

        return response()->json([
            'user' => new UserResource($user->load('profile')),
        ]);
    }
}

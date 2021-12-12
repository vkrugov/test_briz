<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\DeleteRequest;
use App\Http\Requests\User\IndexRequest;
use App\Http\Requests\User\StoreRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\User\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{
    /**
     * @var \App\Services\User\UserService
     */
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param \App\Http\Requests\User\IndexRequest $request
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(IndexRequest $request): AnonymousResourceCollection
    {
        $users = $this->userService->getAll($request->limit);
        UserResource::wrap('users');

        return UserResource::collection($users);
    }

    /**
     * @param \App\Http\Requests\User\StoreRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request): JsonResponse
    {
        $user = $this->userService->create($request->all());

        return response()->json([
            'user' => new UserResource($user->load('profile'))
        ]);
    }

    /**
     * @param \App\Http\Requests\User\DeleteRequest $request
     * @param \App\Models\User                      $user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DeleteRequest $request, User $user): JsonResponse
    {
        return response()->json([
            'success' => $this->userService->delete($user->id)
        ]);
    }

    /**
     * @param \App\Http\Requests\User\DeleteRequest $request
     * @param \App\Models\User                      $user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user): JsonResponse
    {
        return response()->json([
            'user' => $user->load('profile')
        ]);
    }
}

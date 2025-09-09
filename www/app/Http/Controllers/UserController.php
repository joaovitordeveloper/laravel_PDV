<?php

namespace App\Http\Controllers;


use Exception;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Http\Requests\User\UserDeleteRequest;
use App\Http\Requests\User\UserRegisterRequest;
use App\Http\Requests\User\UserUpdateRequest;

/**
 * @author João Vitor Boltelho <developer.joaovitor@gmail.com>
 */
class UserController extends Controller
{
    public function index() {}

    /**
     * Method for user creation
     *
     * @param UserRegisterRequest $request
     * @param UserService $userService
     * @return JsonResponse
     */
    public function create(UserRegisterRequest $request, UserService $userService): JsonResponse
    {
        try {
            $userId = $userService->register($request);
            $return = [
                'user_id' => $userId,
                'message' => 'User created successfully!'
            ];

            return $this->getResponseJson($return);
        } catch (\Exception $e) {
            return $this->getResponseJson(['message' => $e->getMessage()], 400);
        }
    }

    /**
     * Method for user update
     *
     * @param UserUpdateRequest $request
     * @param UserService $userService
     * @return JsonResponse
     */
    public function update(UserUpdateRequest $request, UserService $userService): JsonResponse
    {
        try {
            $userService->update($request);
            $return = [
                'message' => 'User updated successfully!'
            ];

            return $this->getResponseJson($return);
        } catch (\Throwable $th) {
            return $this->getResponseJson(['message' => $th->getMessage()], 400);
        }
    }

    /**
     * Method for user remove
     *
     * @param UserDeleteRequest $request
     * @param UserService $userService
     * @return JsonResponse
     */
    public function delete(UserDeleteRequest $request, UserService $userService): JsonResponse
    {
        try {
            $userService->delete($request);
            $return = [
                'message' => 'User deleted successfully!'
            ];
            return response()->json($return);
        } catch (\Throwable $th) {
            return $this->getResponseJson(['message' => $th->getMessage()], 400);
        }
    }
}

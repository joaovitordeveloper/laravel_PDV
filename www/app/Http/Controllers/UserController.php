<?php

namespace App\Http\Controllers;


use Exception;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;

/**
 * @author João Vitor Boltelho <developer.joaovitor@gmail.com>
 */
class UserController extends Controller
{
    public function index()
    {

    }

    /**
     * Undocumented function
     *
     * @param UserRequest $request
     * @return JsonResponse
     */
    public function create(UserRequest $request, UserService $userService) :JsonResponse
    {
        try {
            $userService->register($request);
            return $this->getResponseJson('User created successfully!');
        } catch (\Exception $e) {
            return $this->getResponseJson($e->getMessage(), 400);
        }
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}

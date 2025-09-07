<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Service\UserService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\UserRequest;

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
    public function create(UserRequest $request) :JsonResponse
    {
        try {
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);
//ajustar mensagem de retorno de uma forma mais generia para todos os controllers
            return response()->json([
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}

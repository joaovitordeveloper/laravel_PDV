<?php

namespace App\Services;

use Exception;
use App\Models\User;
use App\Services\Service;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\UserRequest;
use App\Http\Requests\User\UserDeleteRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Requests\User\UserRegisterRequest;

/**
 * @author João Vitor Boltelho <developer.joaovitor@gmail.com>
 */
class UserService extends Service
{
    /**
     * Method for user creation
     *
     * @param UserRegisterRequest $data
     * @return int
     */
    public function register(UserRegisterRequest $userRequest)
    {
        $data = $userRequest['data'];
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return $user->id;
    }

    /**
     * Method for user update
     *
     * @param UserUpdateRequest $userRequest
     * @return void
     */
    public function update(UserUpdateRequest $userRequest)
    {
        $data = $userRequest['data'];
        $user = User::find($data['id']);

        if (!$user) {
            throw new Exception('User not found!');
        }

        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Method for user remove
     *
     * @param UserDeleteRequest $userRequest
     * @return void
     */
    public function delete(UserDeleteRequest $userRequest)
    {
        $data = $userRequest['data'];
        $user = User::find($data['id']);

        if (!$user) {
            throw new Exception('User not found!');
        }
        
        if (!$user->delete()) {
            throw new Exception('An error occurred while trying to remove the user.');
        }
    }
}

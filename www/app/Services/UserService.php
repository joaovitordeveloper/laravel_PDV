<?php

namespace App\Services;

use App\Models\User;
use App\Services\Service;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\UserRequest;

/**
 * @author João Vitor Boltelho <developer.joaovitor@gmail.com>
 */
class UserService extends Service
{
    /**
     * Method for user creation
     *
     * @param UserRequest $data
     * @return void
     */
    public function register(UserRequest $userRequest)
    {
        $data = $userRequest['data'];
        User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
    }
}
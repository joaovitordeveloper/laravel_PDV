<?php

namespace App\Service;

use App\Models\User;
use App\Services\Service;
use Illuminate\Support\Facades\Hash;

class UserService extends Service
{
    public function register($data)
    {
        User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
    }
}
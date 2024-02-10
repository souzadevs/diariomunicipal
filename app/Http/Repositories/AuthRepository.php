<?php

namespace App\Http\Repositories;

use App\Exceptions\Repositories\Auth\UserEmailNotFoundException;
use App\Exceptions\Repositories\Auth\UserInvalidPasswordException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthRepository
{

    public static function auth($email, $password)
    {
        $user = User::where('email', $email)->first();

        if ($user == null) {
            throw new UserEmailNotFoundException();
        }

        if (!Hash::check($password, $user->password)) {
            throw new UserInvalidPasswordException();
        }

        return $user;
    }
    
}
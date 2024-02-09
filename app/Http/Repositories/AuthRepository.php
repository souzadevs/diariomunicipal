<?php

namespace App\Http\Repositories;

use App\Models\User;

class AuthRepository
{

    public static function auth($email, $password)
    {
        return User::where('email', $email)
            ->where('password', bcrypt($password))
            ->exists();
    }
    
}
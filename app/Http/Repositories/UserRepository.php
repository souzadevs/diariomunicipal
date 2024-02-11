<?php

namespace App\Http\Repositories;

use App\Exceptions\Repositories\Auth\CreateUserFailException;
use App\Models\User;
use Exception;

class UserRepository
{

    public static function emailExists($email): bool
    {
        return User::where('email', $email)->exists();
    }

    public static function create($email, $password, $firstName, $lastName, $userTypeId): User
    {
        $user = new User();

        $user->email = $email;
        $user->password = bcrypt($password);
        $user->first_name = $firstName;
        $user->last_name = $lastName;
        $user->user_type_id = $userTypeId;

        try {
            $user->save();
        } catch (Exception $e) {
            throw $e;
        }
        
        return $user;
    }
    
}
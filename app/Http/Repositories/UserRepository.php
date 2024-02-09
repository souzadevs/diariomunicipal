<?php

namespace App\Http\Repositories;

use App\Exceptions\Repositories\Auth\CreateUserFailException;
use App\Models\User;
use Exception;

class UserRepository
{

    public static function create($email, $password, $firstName, $lastName): User
    {
        $user = new User();

        $user->email = $email;
        $user->password = bcrypt($password);
        $user->firstName = $firstName;
        $user->lastName = $lastName;

        try {
            $user->save();
        } catch (Exception $e) {
            throw $e;
        }
        
        return $user;
    }
    
}
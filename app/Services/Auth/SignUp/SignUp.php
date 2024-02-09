<?php

namespace App\Services\Auth\SignUp;

use App\Exceptions\Repositories\Auth\CreateUserFailException;
use App\Http\Repositories\UserRepository;
use App\Models\User;
use Exception;

class SignUp implements ISignUp
{
    public function signUp($email, $password, $firstName, $lastName): User
    {
        try {
            return UserRepository::create($email, $password, $firstName, $lastName);
        } catch (Exception $e) {
            throw new CreateUserFailException($e->getMessage());
        }
    }
}
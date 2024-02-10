<?php

namespace App\Services\Auth\SignUp;

use App\Exceptions\Repositories\User\CreateUserFailException;
use App\Exceptions\Services\EmptyParamException;
use App\Helpers\ServiceHelper;
use App\Http\Repositories\UserRepository;
use App\Models\User;
use Exception;

class SignUp implements ISignUp
{
    public function signUp($email, $password, $firstName, $lastName, $userTypeId): User
    {
        
        if (ServiceHelper::hasEmptyParam($email, $password, $firstName, $lastName, $userTypeId)) {
            throw new EmptyParamException('Empty parameter.');
        }
        
        try {
            return UserRepository::create($email, $password, $firstName, $lastName, $userTypeId);
        } catch (Exception $e) {
            throw new CreateUserFailException($e->getMessage());
        }
        
    }
    
}
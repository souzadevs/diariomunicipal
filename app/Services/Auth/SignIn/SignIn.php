<?php

namespace App\Services\Auth\SignIn;

use App\Exceptions\Repositories\Auth\EmailOrPasswordInvalidException;
use App\Http\Repositories\AuthRepository;
use App\Models\User;

class SignIn implements ISignIn
{
    public function signIn($email, $password)
    {
        if (!AuthRepository::auth($email, $password)) {
            throw new EmailOrPasswordInvalidException('Email e/ou senha inválido(s)');
        }
    }
}
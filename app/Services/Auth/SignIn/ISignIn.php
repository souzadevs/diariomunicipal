<?php

namespace App\Services\Auth\SignIn;

interface ISignIn
{
    public function signIn($email, $password);
}
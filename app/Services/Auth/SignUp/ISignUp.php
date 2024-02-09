<?php

namespace App\Services\Auth\SignUp;

use App\Models\User;

interface ISignUp
{
    public function signUp($email, $password, $firstName, $lastName): User;
}
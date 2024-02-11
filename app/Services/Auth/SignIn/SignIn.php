<?php

namespace App\Services\Auth\SignIn;

use App\Exceptions\Repositories\Auth\EmailOrPasswordInvalidException;
use App\Exceptions\Repositories\Auth\UserEmailNotFoundException;
use App\Exceptions\Repositories\Auth\UserInvalidPasswordException;
use App\Http\Repositories\AuthRepository;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;

class SignIn implements ISignIn
{
    public function signIn($email, $password)
    {
        try {

            $user = AuthRepository::auth($email, $password);
            Auth::login($user);
            
        } catch (UserInvalidPasswordException $e) {
            throw new EmailOrPasswordInvalidException('Email e/ou senha inválido(s)');
        } catch (UserEmailNotFoundException $e) {
            throw new EmailOrPasswordInvalidException('Email e/ou senha inválido(s)');
        } catch (Exception $e) {
            throw $e;
        }
    }
}
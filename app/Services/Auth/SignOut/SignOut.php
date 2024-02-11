<?php

namespace App\Services\Auth\SignOut;

use App\Exceptions\Services\SignOutFailtException;
use App\Exceptions\Services\ThereAreNoAthenticatedUserException;
use Exception;
use Illuminate\Support\Facades\Auth;

class SignOut implements ISignOut
{
    public function signOut()
    {
        try {

            if (!Auth::check()) {
                throw new ThereAreNoAthenticatedUserException('Não há usuário autênticado.');
            }

            Auth::logout();
        } catch (Exception $e) {
            throw new SignOutFailtException($e->getMessage());
        }
    }
}
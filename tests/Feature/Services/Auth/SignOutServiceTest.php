<?php

namespace Tests\Feature\Services\Auth;

use App\Exceptions\Repositories\User\CreateUserFailException;
use App\Exceptions\Services\EmptyParamException;
use App\Exceptions\Services\SignOutFailtException;
use App\Http\Repositories\AuthRepository;
use App\Services\Auth\SignOut\SignOut;
use App\Services\Auth\SignUp\SignUp;
use Exception;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class SignOutServiceTest extends TestCase
{
    
    public function testShouldBeValidWhenUserIsLogged()
    {
        
        Auth::login(AuthRepository::auth(config('test.valid_email'), config('test.valid_password')));
        
        $this->expectNotToPerformAssertions();

        $signOutService = new SignOut();
        $signOutService->signOut();
    
    }

    public function testShouldBeValidWhenUserIsNotLogged()
    {

        $this->expectException(SignOutFailtException::class);

        $signOutService = new SignOut();
        $signOutService->signOut();

    }
}

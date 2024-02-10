<?php

namespace Tests\Feature\Services\Auth;

use App\Exceptions\Repositories\Auth\EmailOrPasswordInvalidException;
use App\Exceptions\Repositories\Auth\UserEmailNotFoundException;
use App\Exceptions\Repositories\Auth\UserInvalidPasswordException;
use App\Http\Repositories\AuthRepository;
use App\Services\Auth\SignIn\SignIn;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SignInServiceTest extends TestCase
{

    public function testShouldBeValidWhenUseInvalidEmail()
    {

        $this->expectException(Exception::class);
        $this->expectException(EmailOrPasswordInvalidException::class);

        $signInService = new SignIn();
        $signInService->signIn('admin.invalid@company.com', 321);

    }

    public function testShouldBeValidWhenUseInvalidPassword()
    {

        $this->expectException(Exception::class);
        $this->expectException(EmailOrPasswordInvalidException::class);

        $signInService = new SignIn();
        $signInService->signIn(config('test.valid_email'), 321);

    }

    public function testShouldBeValidWhenUseValidCredencials()
    {
        $this->expectNotToPerformAssertions();
        
        $signIn = new SignIn();
        $signIn->signIn(config('test.valid_email'), config('test.valid_password'));

    }
}

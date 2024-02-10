<?php

namespace Tests\Feature\Services\Auth;

use App\Exceptions\Repositories\User\CreateUserFailException;
use App\Exceptions\Services\EmptyParamException;
use App\Services\Auth\SignUp\SignUp;
use Tests\TestCase;

class SignUpServiceTest extends TestCase
{
    
    public function testShouldBeValidWhenUseValidData()
    {
        $this->expectNotToPerformAssertions();

        $singUpService = new SignUp();
        $singUpService->signUp(
            'test'.random_int(1, 2000).'@test.com',
            '123',
            'Jailson',
            'Vendes',
            5
        );
    
    }

    public function testShouldBeValidWhenUseInvalidData()
    {

        $this->expectException(CreateUserFailException::class);
        $this->expectException(EmptyParamException::class);

        $singUpService = new SignUp();
        $singUpService->signUp(
            '',
            '',
            'Jailson',
            'Vendes',
            5
        );

    }
}

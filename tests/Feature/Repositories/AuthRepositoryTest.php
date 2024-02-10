<?php

namespace Tests\Feature\Repositories;

use App\Exceptions\Repositories\Auth\UserEmailNotFoundException;
use App\Exceptions\Repositories\Auth\UserInvalidPasswordException;
use App\Http\Repositories\AuthRepository;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthRepositoryTest extends TestCase
{

    // 'teste deve ser valido quuando' 'parametro' for 'X'
    public function testShouldBeValidWhenEmailAndPasswordIsValid()
    {
        $this->expectNotToPerformAssertions();

        $email = config('test.valid_email');
        $password = config('test.valid_password');

        AuthRepository::auth($email, $password);
    }

    public function testShouleBeValidWhenEmailIsInvalid()
    {
        $invalidEmail = 'admin.invalid@test.com.br';
        $validPassword = config('test.valid_password');
        
        $this->expectException(UserEmailNotFoundException::class);

        AuthRepository::auth($invalidEmail, $validPassword);
    }

    public function testShouldBeValidWhenPasswordIsInvalid()
    {
        $validEmail = config('test.valid_email');
        $validPassword = 321;
        
        $this->expectException(UserInvalidPasswordException::class);
        $this->expectException(Exception::class);

        AuthRepository::auth($validEmail, $validPassword);
    }
}

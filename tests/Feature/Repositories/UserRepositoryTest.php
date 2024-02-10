<?php

namespace Tests\Feature\Repositories;

use App\Http\Repositories\AuthRepository;
use App\Http\Repositories\UserRepository;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Nette\Utils\Random;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{

    // 'teste deve ser valido quuando' 'parametro' for 'X'
    public function testShouldBeValidWhenDataAreValid()
    {
        $this->expectNotToPerformAssertions();

        $user = UserRepository::create(
            'test'.random_int(1, 2000).'@test.com',
            '123',
            'Jailmon',
            'Sendes',
            5
        );

    }

    public function testShouldBeValidWhenEmailOrPasswordIsInvalid()
    {
        $this->expectException(Exception::class);

        UserRepository::create(
            null,
            null,
            null,
            null,
            null,
        );
    }
}

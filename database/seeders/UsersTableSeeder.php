<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $userTypeNames = [
            'Senador',
            'Suporte técnico',
            'Analista',
            'Secretário',
            'Vereador',
            'Usuario do sistema',
        ];

        UserType::create(['name' => $userTypeNames[0], 'description' => 'Test']);
        UserType::create(['name' => $userTypeNames[1], 'description' => 'Test']);
        UserType::create(['name' => $userTypeNames[2], 'description' => 'Test']);
        UserType::create(['name' => $userTypeNames[3], 'description' => 'Test']);
        UserType::create(['name' => $userTypeNames[4], 'description' => 'Test']);
        UserType::create(['name' => $userTypeNames[5], 'description' => 'Test']);

        User::factory()->count(10)->create();

        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Nimda',
            'email' => 'admin@diariomunicipal.com.br',
            'user_type_id' => 3,
            'email_verified_at' => now(),
            'password' => '123',
        ]);
    }
}

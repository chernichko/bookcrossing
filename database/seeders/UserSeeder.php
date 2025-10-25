<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Администратор',
            'login' => 'admin',
            'email' => 'admin@bookswap.ru',
            'password' => Hash::make('123123123'),
        ]);

        User::factory()->create([
            'name' => 'Пользователь',
            'login' => 'user',
            'email' => 'user@bookswap.ru',
            'password' => Hash::make('123123123')
        ]);

        User::factory(10)->create();

    }
}

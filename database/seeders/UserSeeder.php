<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Создаем администратора
        User::factory()->create([
            'name' => 'Администратор',
            'login' => 'admin',
            'email' => 'admin@bookswap.ru',
            'password' => Hash::make('admin123'),
            'city' => 'Москва',
        ]);

        // Создаем тестового пользователя
        User::factory()->create([
            'name' => 'Тестовый Пользователь',
            'login' => 'test_user',
            'email' => 'user@bookswap.ru',
            'password' => Hash::make('user123'),
            'city' => 'Санкт-Петербург',
        ]);

        // Создаем 10 случайных пользователей
        User::factory(10)->create();
    }
}
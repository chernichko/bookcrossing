<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Создаем по 3-5 книг для каждого пользователя
        $users = User::all();

        foreach ($users as $user) {
            Book::factory(rand(3, 5))->create([
                'user_id' => $user->id,
            ]);
        }

        // Дополнительные книги для админа
        $admin = User::where('email', 'admin@bookswap.ru')->first();
        Book::factory(5)->create([
            'user_id' => $admin->id,
        ]);
    }
}

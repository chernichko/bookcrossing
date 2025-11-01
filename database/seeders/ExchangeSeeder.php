<?php

namespace Database\Seeders;

use App\Models\Exchange;
use App\Models\Book;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ExchangeSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create();
        // Берем доступные книги
        $availableBooks = Book::where('status', 'available')->get();

        // Создаем несколько запросов на обмен
        foreach ($availableBooks->take(10) as $book) {
            // Ищем пользователя, который не владелец книги
            $requester = User::where('id', '!=', $book->user_id)->inRandomOrder()->first();

            if ($requester) {
                $exchange = Exchange::create([
                    'requester_id' => $requester->id,
                    'book_id' => $book->id,
                    'status' => $faker->randomElement(['pending', 'accepted', 'completed']),
                    'proposed_date' => $faker->dateTimeBetween('+1 day', '+1 month'),
                    'meeting_point' => $faker->randomElement([
                        'Метро Пушкинская',
                        'ТЦ Афимолл',
                        'Парк Горького',
                        'Библиотека им. Ленина',
                        'Кофейня Starbucks'
                    ]),
                    'message' => $faker->sentence(10),
                    'created_at' => $faker->dateTimeBetween('-2 months', 'now'),
                ]);

                // Если обмен принят или завершен, меняем статус книги
                if (in_array($exchange->status, ['accepted', 'completed'])) {
                    $book->update(['status' => 'reserved']);
                }
            }
        }
    }
}
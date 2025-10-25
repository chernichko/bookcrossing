<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Exchange;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExchangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $availableBooks = Book::where('status', 'available')->get();

        foreach ($availableBooks->take(10) as $book) {
            $requester = User::where('id', '!=', $book->user_id)->inRandomOrder()->first();

            if ($requester) {
                $exchange = Exchange::factory()->create([
                    'requester_id' => $requester->id,
                    'book_id'      => $book->id,
                ]);

                // Если обмен принят или завершен, меняем статус книги
                if (in_array($exchange->status, [
                    'accepted',
                    'completed'
                ])) {
                    $book->update(['status' => 'reserved']);
                    $exchange->update(['completed_at' => now()]);
                }
            }
        }
    }
}

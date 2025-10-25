<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{

    protected $model = Book::class;
    public function definition(): array
    {
        $books = [
            // Русская классика
            ['Преступление и наказание', 'Фёдор Достоевский'],
            ['Война и мир', 'Лев Толстой'],
            ['Мастер и Маргарита', 'Михаил Булгаков'],
            ['Евгений Онегин', 'Александр Пушкин'],
            ['Отцы и дети', 'Иван Тургенев'],

            // Зарубежная классика
            ['1984', 'Джордж Оруэлл'],
            ['Убить пересмешника', 'Харпер Ли'],
            ['Великий Гэтсби', 'Фрэнсис Скотт Фицджеральд'],
            ['Гордость и предубеждение', 'Джейн Остин'],
            ['Над пропастью во ржи', 'Джером Сэлинджер'],

            // Фантастика
            ['Марсианин', 'Энди Вейер'],
            ['Игра Эндера', 'Орсон Скотт Кард'],
            ['Дюна', 'Фрэнк Герберт'],
            ['Основание', 'Айзек Азимов'],
            ['Автостопом по галактике', 'Дуглас Адамс'],

            // Фэнтези
            ['Властелин Колец', 'Дж. Р. Р. Толкин'],
            ['Гарри Поттер', 'Дж. К. Роулинг'],
            ['Хроники Нарнии', 'Клайв С. Льюис'],
            ['Игра престолов', 'Джордж Мартин'],
            ['Ведьмак', 'Анджей Сапковский'],
        ];

        $randomBook = $this->faker->randomElement($books);

        return [
            'user_id' => User::factory(),
            'title' => $randomBook[0],
            'author' => $randomBook[1],
            'isbn' => $this->faker->isbn13(),
            'description' => $this->faker->paragraph(3),
            'category_id' => Category::inRandomOrder()->first()->id,
            'condition' => $this->faker->randomElement(['excellent', 'good', 'satisfactory', 'poor']),
            'status' => $this->faker->randomElement(['available', 'available', 'available', 'reserved']), // чаще available
            'published_year' => $this->faker->year('2020'),
            'language' => 'Russian',
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];

    }
}

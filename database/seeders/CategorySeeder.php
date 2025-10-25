<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Художественная литература', 'slug' => 'fiction'],
            ['name' => 'Фантастика', 'slug' => 'science-fiction'],
            ['name' => 'Детективы', 'slug' => 'detective'],
            ['name' => 'Фэнтези', 'slug' => 'fantasy'],
            ['name' => 'Романы', 'slug' => 'novels'],
            ['name' => 'Приключения', 'slug' => 'adventure'],
            ['name' => 'Ужасы', 'slug' => 'horror'],
            ['name' => 'Классическая литература', 'slug' => 'classic'],
            ['name' => 'Поэзия', 'slug' => 'poetry'],
            ['name' => 'Драма', 'slug' => 'drama'],
            ['name' => 'Научная литература', 'slug' => 'science'],
            ['name' => 'Историческая литература', 'slug' => 'historical'],
            ['name' => 'Биографии', 'slug' => 'biography'],
            ['name' => 'Саморазвитие', 'slug' => 'self-development'],
            ['name' => 'Кулинария', 'slug' => 'cooking'],
            ['name' => 'Детские книги', 'slug' => 'children'],
            ['name' => 'Учебная литература', 'slug' => 'educational'],
            ['name' => 'Бизнес', 'slug' => 'business'],
            ['name' => 'Психология', 'slug' => 'psychology'],
            ['name' => 'Путешествия', 'slug' => 'travel'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

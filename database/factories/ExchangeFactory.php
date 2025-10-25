<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exchange>
 */
class ExchangeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => $this->faker->randomElement(['pending', 'accepted', 'completed']),
            'proposed_date' => $this->faker->dateTimeBetween('+1 day', '+1 month'),
            'meeting_point' => $this->faker->randomElement([
                'Метро Пушкинская',
                'ТЦ Афимолл',
                'Парк Горького',
                'Библиотека им. Ленина',
                'Кофейня Starbucks'
            ]),
            'message' => $this->faker->sentence(10),
            'created_at' => $this->faker->dateTimeBetween('-2 months', 'now'),
        ];
    }
}

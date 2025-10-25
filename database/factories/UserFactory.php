<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'login' => $this->faker->unique()->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // пароль: password
            'phone' => $this->faker->phoneNumber(),
            'rating' => $this->faker->randomFloat(2, 3, 5),
            'last_active_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'remember_token' => Str::random(10),
        ];
    }
}

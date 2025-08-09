<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<User>
 */
final class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'telegram_id' => rand(1_000_000, 1_000_000_000),
            'username' => rand(0, 1) ? str_replace('.', '', $this->faker->username()) : null,
            'first_name' => $this->faker->firstName(),
            'last_name' => rand(0, 1) ? $this->faker->lastName() : null,
            'photo_url' => rand(0, 1) ? $this->faker->imageUrl() : null,
            'language_code' => rand(0, 1) ? $this->faker->languageCode() : null,
        ];
    }
}

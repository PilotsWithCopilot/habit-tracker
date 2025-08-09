<?php

declare(strict_types=1);

namespace Database\Factories\Habit;

use App\Models\Habit\Habit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Habit>
 */
final class HabitFactory extends Factory
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
            'name' => $this->faker->text(25),
            'description' => rand(0, 1) ? $this->faker->text() : null,
            'visibility' => $this->faker->randomElement(['private', 'protected', 'public']),
            'starts_at' => $this->faker->dateTimeBetween('2025-01-01'),
            'ends_at' => $this->faker->dateTimeBetween('now', '+1 year'),
        ];
    }
}

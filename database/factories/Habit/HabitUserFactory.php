<?php

declare(strict_types=1);

namespace Database\Factories\Habit;

use App\Models\Habit\Habit;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Habit>
 */
final class HabitUserFactory extends Factory
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
            'habit_id' => Habit::factory(),
            'user_id' => User::factory(),
            'is_leader' => $this->faker->boolean(),
        ];
    }
}

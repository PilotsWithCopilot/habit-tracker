<?php

declare(strict_types=1);

namespace Database\Factories\Habit;

use App\Models\Habit\HabitUser;
use App\Models\Habit\HabitUserLogEntry;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<HabitUserLogEntry>
 */
final class HabitUserLogEntryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isSuccessful = $this->faker->boolean();

        return [
            'id' => $this->faker->uuid(),
            'is_successful' => $isSuccessful,
            'habit_user_id' => HabitUser::factory(),
            'comment' => $isSuccessful ? $this->faker->text(1000) : null,
            'logged_at' => $this->faker->dateTime(),
        ];
    }
}

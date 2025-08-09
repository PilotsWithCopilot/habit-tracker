<?php

declare(strict_types=1);

namespace App\Models\Habit;

use Database\Factories\Habit\HabitUserLogEntryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class HabitUserLogEntry extends Model
{
    /** @use HasFactory<HabitUserLogEntryFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'logged_at' => 'immutable_datetime',
        ];
    }
}

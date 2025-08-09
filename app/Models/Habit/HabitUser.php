<?php

declare(strict_types=1);

namespace App\Models\Habit;

use Database\Factories\Habit\HabitUserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @property string $id
 * @property string $habit_id
 * @property string $user_id
 * @property bool $is_leader
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HabitUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HabitUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HabitUser query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HabitUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HabitUser whereHabitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HabitUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HabitUser whereIsLeader($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HabitUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HabitUser whereUserId($value)
 *
 * @mixin \Eloquent
 */
final class HabitUser extends Pivot
{
    /** @use HasFactory<HabitUserFactory> */
    use HasFactory;
}

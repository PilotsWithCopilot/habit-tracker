<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('habit_user_log_entries', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->timestamp('logged_at');

            $table->boolean('is_successful');

            $table->text('comment')->nullable();

            $table->foreignUuid('habit_user_id')
                ->constrained('habit_user');

            $table->timestamps();
        });
    }
};

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
        Schema::create('habits', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('name');

            $table->text('description')->nullable();

            $table->timestamp('starts_at');
            $table->timestamp('ends_at');

            $table->enum('visibility', ['private', 'protected', 'public'])->index();

            $table->timestamps();
        });
    }
};

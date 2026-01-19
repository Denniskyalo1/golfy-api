<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user_clubs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('club_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->boolean('is_enabled')->default(true);
            $table->unsignedSmallInteger('custom_distance_yds')->nullable();

            $table->timestamps();

            $table->unique(['user_id', 'club_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_clubs');
    }
};

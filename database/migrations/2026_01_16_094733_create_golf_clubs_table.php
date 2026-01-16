<?php

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
        Schema::create('golf_clubs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->enum('club_name', ['Driver', '3 Wood', '5 Wood', '2 Hybrid', '3 Hybrid', '4 Iron', '5 Iron', '6 Iron', '7 Iron', '8 Iron', '9 Iron', 'Pitching Wedge (46°)', 'Gap Wedge (50°)', 'Sand Wedge (54°)', 'Lob Wedge (58°)', 'Putter'])->isNotEmpty();
            $table->string('brand_name')->nullable();
            $table->integer('yardage_yards')->nullable();
            $table->integer('yardage_metres')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('golf_clubs');
    }
};

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
    Schema::create('golf_courses', function (Blueprint $table) {
    $table->id();

    // Core info
    $table->string('name');
    $table->string('course_type'); 

    // Location
    $table->string('country');
    $table->string('city');
    $table->decimal('latitude', 10, 7)->nullable();
    $table->decimal('longitude', 10, 7)->nullable();

    // Course details
    $table->integer('holes');
    $table->integer('par');

    // Pricing
    $table->decimal('green_fees', 8, 2)->nullable();
 
    // Media & status
    $table->string('cover_image')->nullable();
    $table->boolean('is_active')->default(true);

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('golf_courses');
    }
};

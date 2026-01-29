<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('golf_courses', function (Blueprint $table) {
        $table->string('google_place_id')->nullable()->unique()->after('name');

        $table->decimal('rating', 2, 1)->nullable()->after('green_fees');
        $table->integer('reviews_count')->nullable()->after('rating');

        $table->string('phone')->nullable()->after('reviews_count');
        $table->string('website')->nullable()->after('phone');

        $table->boolean('is_open_now')->nullable()->after('website');
        $table->json('opening_hours')->nullable()->after('is_open_now');

        $table->text('description')->nullable()->after('opening_hours');


        $table->integer('likes_count')->default(0)->after('description');
        $table->integer('views_count')->default(0)->after('likes_count');
    });
}

public function down(): void
{
    Schema::table('golf_courses', function (Blueprint $table) {
        $table->dropColumn([
            'google_place_id',
            'rating',
            'reviews_count',
            'phone',
            'website',
            'is_open_now',
            'opening_hours',
            'description',
            'likes_count',
            'views_count',
        ]);
    });
}

};

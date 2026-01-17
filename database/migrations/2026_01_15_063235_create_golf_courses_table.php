<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
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

        DB::table('golf_courses')->insert([
            ['id' => 1, 'name' => 'Golf Park Golf Club', 'course_type' => 'public', 'country' => 'Kenya', 'city' => 'Nairobi', 'latitude' => -1.2921, 'longitude' => 36.8219, 'holes' => 18, 'par' => 72, 'green_fees' => 3500, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 2, 'name' => 'Karen Country Club', 'course_type' => 'private', 'country' => 'Kenya', 'city' => 'Nairobi', 'latitude' => -1.3320, 'longitude' => 36.7070, 'holes' => 18, 'par' => 72, 'green_fees' => 6500, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 3, 'name' => 'Kenya Airforce Golf Club', 'course_type' => 'military', 'country' => 'Kenya', 'city' => 'Nairobi', 'latitude' => -1.3174, 'longitude' => 36.8621, 'holes' => 18, 'par' => 72, 'green_fees' => 4000, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 4, 'name' => 'Kenya Railways Golf Club', 'course_type' => 'private', 'country' => 'Kenya', 'city' => 'Nairobi', 'latitude' => -1.2921, 'longitude' => 36.8374, 'holes' => 18, 'par' => 72, 'green_fees' => 5000, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 5, 'name' => 'Kiambu Golf Course', 'course_type' => 'public', 'country' => 'Kenya', 'city' => 'Kiambu', 'latitude' => -1.1714, 'longitude' => 36.8356, 'holes' => 18, 'par' => 72, 'green_fees' => 3500, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 6, 'name' => 'Limuru Country Club', 'course_type' => 'private', 'country' => 'Kenya', 'city' => 'Limuru', 'latitude' => -1.1150, 'longitude' => 36.6428, 'holes' => 18, 'par' => 72, 'green_fees' => 5500, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 7, 'name' => 'Machakos Golf Club', 'course_type' => 'public', 'country' => 'Kenya', 'city' => 'Machakos', 'latitude' => -1.5177, 'longitude' => 37.2634, 'holes' => 18, 'par' => 72, 'green_fees' => 3000, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 8, 'name' => 'Muthaiga Golf Club', 'course_type' => 'private', 'country' => 'Kenya', 'city' => 'Nairobi', 'latitude' => -1.2570, 'longitude' => 36.8425, 'holes' => 18, 'par' => 72, 'green_fees' => 7000, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 9, 'name' => 'Ndumberi Golf Club', 'course_type' => 'public', 'country' => 'Kenya', 'city' => 'Ndumberi', 'latitude' => -1.1357, 'longitude' => 36.9243, 'holes' => 18, 'par' => 72, 'green_fees' => 3500, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 10, 'name' => 'Royal Nairobi Golf Club', 'course_type' => 'private', 'country' => 'Kenya', 'city' => 'Nairobi', 'latitude' => -1.2632, 'longitude' => 36.8033, 'holes' => 18, 'par' => 72, 'green_fees' => 6000, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 11, 'name' => 'Ruiru Sports Club', 'course_type' => 'public', 'country' => 'Kenya', 'city' => 'Ruiru', 'latitude' => -1.1439, 'longitude' => 36.9609, 'holes' => 18, 'par' => 72, 'green_fees' => 3200, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 12, 'name' => 'Sigona Golf Club', 'course_type' => 'private', 'country' => 'Kenya', 'city' => 'Nairobi', 'latitude' => -1.2394, 'longitude' => 36.6902, 'holes' => 18, 'par' => 72, 'green_fees' => 6500, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 13, 'name' => 'Thika Barracks Golf Club', 'course_type' => 'military', 'country' => 'Kenya', 'city' => 'Thika', 'latitude' => -1.0332, 'longitude' => 37.0693, 'holes' => 18, 'par' => 72, 'green_fees' => 4000, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 14, 'name' => 'Thika Greens Golf Resort', 'course_type' => 'resort', 'country' => 'Kenya', 'city' => 'Thika', 'latitude' => -1.0395, 'longitude' => 37.0902, 'holes' => 18, 'par' => 72, 'green_fees' => 5500, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 15, 'name' => 'Thika Sports Club', 'course_type' => 'public', 'country' => 'Kenya', 'city' => 'Thika', 'latitude' => -1.0332, 'longitude' => 37.0693, 'holes' => 18, 'par' => 72, 'green_fees' => 3500, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 16, 'name' => 'VetLab Sports Club', 'course_type' => 'private', 'country' => 'Kenya', 'city' => 'Nairobi', 'latitude' => -1.2584, 'longitude' => 36.7287, 'holes' => 18, 'par' => 72, 'green_fees' => 5500, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 17, 'name' => 'Windsor Golf Hotel and Country Club', 'course_type' => 'resort', 'country' => 'Kenya', 'city' => 'Nairobi', 'latitude' => -1.1842, 'longitude' => 36.8941, 'holes' => 18, 'par' => 72, 'green_fees' => 8500, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 18, 'name' => 'Migaa Golf Club', 'course_type' => 'private', 'country' => 'Kenya', 'city' => 'Nairobi', 'latitude' => -1.1023, 'longitude' => 36.7156, 'holes' => 18, 'par' => 72, 'green_fees' => 6000, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 19, 'name' => 'Leisure Lodge', 'course_type' => 'resort', 'country' => 'Kenya', 'city' => 'Diani', 'latitude' => -4.3166, 'longitude' => 39.5833, 'holes' => 18, 'par' => 72, 'green_fees' => 7000, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 20, 'name' => 'Malindi Golf Club', 'course_type' => 'public', 'country' => 'Kenya', 'city' => 'Malindi', 'latitude' => -3.2167, 'longitude' => 40.1167, 'holes' => 18, 'par' => 72, 'green_fees' => 4500, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 21, 'name' => 'Mombasa Golf Club', 'course_type' => 'private', 'country' => 'Kenya', 'city' => 'Mombasa', 'latitude' => -4.0435, 'longitude' => 39.6682, 'holes' => 18, 'par' => 72, 'green_fees' => 6000, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 22, 'name' => 'Nyali Golf and Country Club', 'course_type' => 'private', 'country' => 'Kenya', 'city' => 'Mombasa', 'latitude' => -4.0167, 'longitude' => 39.7167, 'holes' => 18, 'par' => 72, 'green_fees' => 6500, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 23, 'name' => 'Vipingo Ridge Golf Club', 'course_type' => 'resort', 'country' => 'Kenya', 'city' => 'Vipingo', 'latitude' => -3.8843, 'longitude' => 39.7454, 'holes' => 18, 'par' => 72, 'green_fees' => 8000, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 24, 'name' => 'Kakamega Sports Club', 'course_type' => 'public', 'country' => 'Kenya', 'city' => 'Kakamega', 'latitude' => 0.2847, 'longitude' => 34.7519, 'holes' => 18, 'par' => 72, 'green_fees' => 3000, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 25, 'name' => 'Kisii Golf Club', 'course_type' => 'public', 'country' => 'Kenya', 'city' => 'Kisii', 'latitude' => -0.6817, 'longitude' => 34.7679, 'holes' => 18, 'par' => 72, 'green_fees' => 3000, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 26, 'name' => 'Mumias Golf Club', 'course_type' => 'public', 'country' => 'Kenya', 'city' => 'Mumias', 'latitude' => 0.3347, 'longitude' => 34.4878, 'holes' => 18, 'par' => 72, 'green_fees' => 2800, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 27, 'name' => 'Nyanza Golf Club', 'course_type' => 'public', 'country' => 'Kenya', 'city' => 'Kisumu', 'latitude' => -0.0917, 'longitude' => 34.7680, 'holes' => 18, 'par' => 72, 'green_fees' => 3500, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 28, 'name' => 'Eldoret Golf Club', 'course_type' => 'public', 'country' => 'Kenya', 'city' => 'Eldoret', 'latitude' => 0.5143, 'longitude' => 35.2698, 'holes' => 18, 'par' => 72, 'green_fees' => 3500, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 29, 'name' => 'Kericho Golf Club', 'course_type' => 'public', 'country' => 'Kenya', 'city' => 'Kericho', 'latitude' => -0.3691, 'longitude' => 35.2839, 'holes' => 18, 'par' => 72, 'green_fees' => 3200, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 30, 'name' => 'Kitale Golf Club', 'course_type' => 'public', 'country' => 'Kenya', 'city' => 'Kitale', 'latitude' => 1.0157, 'longitude' => 35.0062, 'holes' => 18, 'par' => 72, 'green_fees' => 3000, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 31, 'name' => 'Nandi Bears Golf Club', 'course_type' => 'public', 'country' => 'Kenya', 'city' => 'Nandi', 'latitude' => 0.1836, 'longitude' => 35.1270, 'holes' => 18, 'par' => 72, 'green_fees' => 3200, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 32, 'name' => 'Nanyuki Sports Club', 'course_type' => 'public', 'country' => 'Kenya', 'city' => 'Nanyuki', 'latitude' => 0.0167, 'longitude' => 37.0667, 'holes' => 18, 'par' => 72, 'green_fees' => 3800, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 33, 'name' => 'Nyahururu Country Club', 'course_type' => 'private', 'country' => 'Kenya', 'city' => 'Nyahururu', 'latitude' => 0.0380, 'longitude' => 36.3636, 'holes' => 18, 'par' => 72, 'green_fees' => 4500, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 34, 'name' => 'Nyeri Golf Club', 'course_type' => 'public', 'country' => 'Kenya', 'city' => 'Nyeri', 'latitude' => -0.4197, 'longitude' => 36.9489, 'holes' => 18, 'par' => 72, 'green_fees' => 3800, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 35, 'name' => 'Gilgil Country Club', 'course_type' => 'private', 'country' => 'Kenya', 'city' => 'Gilgil', 'latitude' => -0.5000, 'longitude' => 36.3167, 'holes' => 18, 'par' => 72, 'green_fees' => 4500, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 36, 'name' => 'Great Rift Valley Golf Resort', 'course_type' => 'resort', 'country' => 'Kenya', 'city' => 'Naivasha', 'latitude' => -0.7175, 'longitude' => 36.4334, 'holes' => 18, 'par' => 72, 'green_fees' => 7500, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 37, 'name' => 'Naivasha Sports Club', 'course_type' => 'public', 'country' => 'Kenya', 'city' => 'Naivasha', 'latitude' => -0.7156, 'longitude' => 36.4331, 'holes' => 18, 'par' => 72, 'green_fees' => 3500, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 38, 'name' => 'Nakuru Golf Club', 'course_type' => 'public', 'country' => 'Kenya', 'city' => 'Nakuru', 'latitude' => -0.3031, 'longitude' => 36.0800, 'holes' => 18, 'par' => 72, 'green_fees' => 3500, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 39, 'name' => 'Njoro Country Club', 'course_type' => 'private', 'country' => 'Kenya', 'city' => 'Njoro', 'latitude' => -0.3361, 'longitude' => 35.9353, 'holes' => 18, 'par' => 72, 'green_fees' => 4500, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
            ['id' => 40, 'name' => 'Mt. Kipipiri Golf Resort', 'course_type' => 'resort', 'country' => 'Kenya', 'city' => 'Ol Kalou', 'latitude' => -0.2667, 'longitude' => 36.3833, 'holes' => 18, 'par' => 72, 'green_fees' => 6500, 'cover_image' => null, 'is_active' => 1, 'created_at' => '2026-01-16 00:00:00', 'updated_at' => '2026-01-16 00:00:00'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('golf_courses');
    }
};

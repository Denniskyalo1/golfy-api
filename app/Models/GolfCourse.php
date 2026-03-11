<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GolfCourse extends Model
{
    protected $fillable = [
        'name',
        'course_type',
        'google_place_id',
        'rating',
        'reviews_count',
        'likes_count',
        'phone',
        'website',
        'is_open_now',
        'opening_hours',
        'description',
        'country',
        'city',
        'latitude',
        'longitude',
        'holes',
        'par',
        'green_fees',
        'cover_image',
        'is_active'
    ];

    public function likedByUsers()
    {
        return $this->belongsToMany(User::class, 'user_golf_course_likes')->withTimestamps();
    }

}



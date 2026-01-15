<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GolfCourse extends Model
{
    protected $fillable = [
        'name',
        'course_type',
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
}


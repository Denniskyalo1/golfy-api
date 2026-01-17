<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GolfClub extends Model
{
    protected $fillable = [
        'user_id',
        'club_name',
        'brand_name',
        'yardage_yards',
        'yardage_metres'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

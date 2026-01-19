<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Club extends Model
{
    protected $fillable = [
        'club_category_id',
        'name',
        'default_distance_yds',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'default_distance_yds' => 'integer',
        'sort_order'           => 'integer',
        'is_active'            => 'boolean',
    ];

    /**
     * Club belongs to a category
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(ClubCategory::class, 'club_category_id');
    }

    /**
     * A club can belong to many users (via user_clubs)
     */
    public function userClubs(): HasMany
    {
        return $this->hasMany(UserClub::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserClub extends Model
{
    protected $fillable = [
        'user_id',
        'club_id',
        'is_enabled',
        'custom_distance_yds',
    ];

    protected $casts = [
        'is_enabled'           => 'boolean',
        'custom_distance_yds'  => 'integer',
    ];

    /**
     * This club belongs to a user
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * This is the canonical club
     */
    public function club(): BelongsTo
    {
        return $this->belongsTo(Club::class);
    }

    /**
     * Get effective distance (custom overrides default)
     */
    public function getEffectiveDistanceAttribute(): int
    {
        return $this->custom_distance_yds
            ?? $this->club->default_distance_yds;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClubCategory extends Model
{
    protected $fillable = [
        'name',
        'sort_order',
    ];

    /**
     * A category has many clubs
     */
    public function clubs(): HasMany
    {
        return $this->hasMany(Club::class)
            ->orderBy('sort_order');
    }
}

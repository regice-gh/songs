<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Album extends Model
{
    protected $table = 'album';

    protected $fillable = [
        'name',
        'release_date',
        'timer_sold',
        'band_id',
    ];

    public function band(): BelongsTo
    {
        return $this->belongsTo(Band::class);
    }
    public function songs(): HasMany
    {
        return $this->hasMany(Song::class);
    }
}

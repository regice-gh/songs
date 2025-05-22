<?php

namespace App\Models;
use App\Models\Album;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    protected $table = 'band';
    protected $fillable = [
        'name',
        'genre',
        'formation_year',
        'band_id',
    ];

    public function Album(): HasMany
    {
        return $this->hasMany(Album::class);
    }
}

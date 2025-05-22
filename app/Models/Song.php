<?php

namespace App\Models;

use App\Models\Album;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $table = 'songs';


    protected $fillable = [
        'title',
        'artist',
        'album_id'
    ];
    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }
}

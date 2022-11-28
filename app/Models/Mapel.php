<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $guarded = [
        "created_at",
        "updated_at"
    ];

    /**
     * Get all of the table for the Mapel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nilai(): HasMany
    {
        return $this->hasMany(Nilai::class, 'mapel', 'mapel_id');
    }

    /**
     * The guru that belong to the Mapel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function guru(): BelongsToMany
    {
        return $this->belongsToMany(Guru::class, 'mapel_gurus', 'mapel_id', 'NIP');
    }
}

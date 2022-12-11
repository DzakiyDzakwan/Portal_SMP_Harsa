<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mapel extends Model
{
    use HasFactory, softDeletes;

    protected $primaryKey = 'kelas_id';

    protected $guarded = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Get all of the table for the Mapel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nilais(): HasMany
    {
        return $this->hasMany(Nilai::class, 'mapel', 'mapel_id');
    }

    /**
     * The guru that belong to the Mapel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function gurus(): BelongsToMany
    {
        return $this->belongsToMany(Guru::class, 'mapel_gurus', 'mapel_id', 'NIP');
    }
}

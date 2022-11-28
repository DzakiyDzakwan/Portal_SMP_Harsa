<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $guarded = [
        "created_at",
        "updated_at"
    ];

    /**
     * Get the table that owns the Guru
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user', 'uuid');
    }

    /**
     * The mapel that belong to the Guru
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function mapel(): BelongsToMany
    {
        return $this->belongsToMany(Mapel::class, 'mapel_gurus', 'NIP', 'mapel_id');
    }

    /**
     * Get the table associated with the Guru
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kelas(): HasOne
    {
        return $this->hasOne(Kelas::class, 'wali_kelas', 'NIP');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use HasFactory, softDeletes;

    protected $primaryKey = 'kelas_id';

    protected $guarded = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Get the table that owns the Kelas
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gurus(): BelongsTo
    {
        return $this->belongsTo(Guru::class, 'wali_kelas', 'NIP');
    }

    /**
     * Get all of the table for the Kelas
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function siswas()
    {
        return $this->hasMany(Siswa::class, 'kelas', 'kelas_id');
    }

    public function rosters(): HasMany
    {
        return $this->hasMany(RosterKelas::class, 'ruang_kelas', 'kelas_id');
    }
}

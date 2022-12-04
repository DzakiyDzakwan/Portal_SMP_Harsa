<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'user',
        'NISN',
        'NIS',
        'ruang_kelas',
        'kelas_awal',
        'tanggal_masuk',
        'semester',
        'status_keaktifan',
    ];

    /**
     * Get the user that owns the Siswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user', 'uuid');
    }

    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class, 'ruang_kelas', 'kelas_id');
    }

    /**
     * Get all of the prestasi for the Siswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prestasi(): HasMany
    {
        return $this->hasMany(Prestasi::class, 'siswa', 'NISN');
    }

    public function nilai(): HasMany
    {
        return $this->hasMany(Nilai::class, 'siswa', 'NISN');
    }

    public function absensi(): HasMany
    {
        return $this->hasMany(RekapAbsensi::class, 'siswa', 'NISN');
    }

    public function tagihan(): HasMany
    {
        return $this->hasMany(Tagihan::class, 'siswa', 'NISN');
    }
}

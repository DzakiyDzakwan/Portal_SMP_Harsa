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

    /**
     * Get the user that owns the Siswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users(): BelongsTo
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
    public function prestasis()
    {
        return $this->hasMany(Prestasi::class, 'siswa', 'NISN');
    }

    public function kontrak_semesters()
    {
        return $this->hasMany(KontrakSemester::class, 'siswa', 'NISN');
    }
}

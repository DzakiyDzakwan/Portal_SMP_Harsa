<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontrakSemester extends Model
{
    use HasFactory;

    protected $guarded = [
        'kontrak_semester_id',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the siswas that owns the KontrakSemester
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function siswas()
    {
        return $this->belongsTo(Siswa::class, 'siswa', 'NISN');
    }

    /**
     * Get all of the nilais for the KontrakSemester
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nilais()
    {
        return $this->hasMany(Nilai::class, 'kontrak_siswa', 'kontrak_semester_id');
    }

    public function rekap_absensis()
    {
        return $this->hasMany(RekapAbsensi::class, 'kontrak_siswa', 'kontrak_semester_id');
    }

    public function ekskul_siswas()
    {
        return $this->hasMany(EkskulSiswa::class, 'kontrak_siswa', 'kontrak_semester_id');
    }
}

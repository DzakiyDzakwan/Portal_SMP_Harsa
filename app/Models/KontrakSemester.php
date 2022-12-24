<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontrakSemester extends Model
{
    use HasFactory;

    protected $primaryKey = 'kontrak_semester_id';

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

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas', 'kelas_id');
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

    public function nilai_ektrakurikulers()
    {
        return $this->hasMany(NilaiEkstrakurikuler::class, 'kontrak_siswa', 'kontrak_semester_id');
    }
}

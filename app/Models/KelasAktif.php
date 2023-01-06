<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasAktif extends Model
{
    use HasFactory;
    protected $primaryKey = 'kelas_aktif_id';

    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    /**
     * Get the table that owns the Kelas
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gurus()
    {
        return $this->belongsTo(Guru::class, 'wali_kelas', 'NUPTK');
    }

    /**
     * Get all of the table for the Kelas
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function siswas()
    {
        return $this->hasMany(KontrakSemester::class, 'kelas', 'kelas_aktif_id');
    }

    public function rosters()
    {
        return $this->hasMany(RosterKelas::class, 'kelas', 'kelas_aktif_id');
    }
}

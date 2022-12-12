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
    public function users()
    {
        return $this->belongsTo(User::class, 'user', 'uuid');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'kelas');
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

    public function profiles(){
        return $this->belongsTo(UserProfile::class, 'user', 'user');
    }
}

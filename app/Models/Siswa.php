<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $primaryKey = 'NISN';

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

    public function profiles(){
        return $this->hasOne(UserProfile::class, 'user', 'user');
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

    public function kontraks()
    {
        return $this->hasMany(KontrakSemester::class, 'siswa', 'NISN');
    }

    /**
     * The ekstrakurikulers that belong to the Siswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function ekstrakurikulers()
    {
        return $this->belongsToMany(Ekstrakurikuler::class, 'ekstrakurikuler_siswas', 'siswa', 'ekstrakurikuler');
    }

}

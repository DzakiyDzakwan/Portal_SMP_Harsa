<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Guru extends Model
{
    use HasFactory;

    protected $primaryKey = 'nuptk';

    protected $guarded = [
        "created_at",
        "updated_at"
    ];

    /**
     * Get the table that owns the Guru
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo(User::class, 'user', 'uuid');
    }

    /**
     * The mapel that belong to the Guru
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function mapel()
    {
        return $this->belongsToMany(Mapel::class, 'mapel_gurus', 'NIP', 'mapel_id');
    }

    /**
     * Get the table associated with the Guru
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kelas()
    {
        return $this->hasOne(Kelas::class, 'wali_kelas', 'NUPTK');
    }

    public function ekstrakurikulers()
    {
        return $this->hasOne(Ekstrakurikuler::class, 'penanggung_jawab', 'NUPTK');
    }


    public function profiles(){
        return $this->belongsTo(UserProfile::class, 'user', 'user');
    }

    /**
     * Get all of the nilais for the Guru
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nilais()
    {
        return $this->hasMany(Nilai::class, 'guru', 'NUPTK');
    }
    
}

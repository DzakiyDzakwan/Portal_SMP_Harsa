<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EkstrakurikulerSiswa extends Model
{
    use HasFactory;

    protected $guarded = [
        'ekskul_siswa_id',
        'created_at',
        'updated_at'
    ];

    /**
     * The siswas that belong to the EkstrakurikulerSiswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function siswas()
    {
        return $this->belongsToMany(Siswa::class, 'ekstrakurikuler_siswas', 'siswa', 'ekstrakurikuler');
    }
}

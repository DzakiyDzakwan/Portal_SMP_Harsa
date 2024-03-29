<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $primaryKey = 'prestasi_id';

    protected $guarded = [
        "prestasi_id",
        "created_at",
        "updated_at"
    ];

    /**
     * Get the siswa that owns the Prestasi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function siswas()
    {
        return $this->belongsTo(Siswa::class, 'siswa', 'NISN');
    }

}

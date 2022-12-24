<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    use HasFactory;

    protected $primaryKey = 'ekstrakurikuler_id';

    protected $guarded = [
        "created_at",
        "updated_at"
    ];

    /**
     * Get the penanggungJawab that owns the Ekstrakurikuler
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function penanggungJawab(): BelongsTo
    {
        return $this->belongsTo(Guru::class, 'penanggung_jawab', 'NUPTK');
    }

    /**
     * The siswa that belong to the Ekstrakurikuler
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function siswa()
    {
        return $this->belongsToMany(Siswa::class, 'ekstrakurikuler_siswas', 'ektrakurikuler_id', 'NISN');
    }
}

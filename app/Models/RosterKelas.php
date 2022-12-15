<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RosterKelas extends Model
{
    use HasFactory;

    protected $guarded = [
        "created_at",
        "updated_at"
    ];

    /**
     * Get the mapel_gurus that owns the Roster
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mapel_gurus()
    {
        return $this->belongsTo(MapelGuru::class, 'mapel', 'mapel_guru_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas', 'kelas_id');
    }
}

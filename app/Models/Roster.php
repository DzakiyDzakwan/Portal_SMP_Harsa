<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roster extends Model
{
    use HasFactory;

    protected $primaryKey = 'roster_id';

    protected $guarded = [
        "roster_id",
        "created_at",
        "updated_at"
    ];

    /**
     * Get the mapel_gurus that owns the Roster
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mapels()
    {
        return $this->belongsTo(MapelGuru::class, 'mapel', 'mapel_guru_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas', 'kelas_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $primaryKey = 'nilai_id';

    protected $guarded = [
        "nilai_id",
        "created_at",
        "updated_at"
    ];

    /**
     * Get the siswa that owns the Nilai
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kontrak_siswas(): BelongsTo
    {
        return $this->belongsTo(KontrakSemester::class, 'kontrak_siswa', 'kontrak_semester_id');
    }

    public function mapel(): BelongsTo
    {
        return $this->belongsTo(Mapel::class, 'mapel', 'mapel_id');
    }

    public function sesi()
    {
        return $this->belongsTo(SesiPenilaian::class, 'sesi', 'sesi_id');
    }
    
}

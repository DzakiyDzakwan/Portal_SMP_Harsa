<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapAbsensi extends Model
{
    use HasFactory;

    protected $guarded = [
        "created_at",
        "updated_at"
    ];

    /**
     * Get the siswa that owns the RekapAbsensi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kontrak_semesters(): BelongsTo
    {
        return $this->belongsTo(KontrakSemester::class, 'kontrak_siswa', 'kontrak_semester_id');
    }
}

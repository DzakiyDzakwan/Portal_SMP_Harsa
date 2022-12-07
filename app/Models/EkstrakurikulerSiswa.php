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
     * Get the ekskuls that owns the EkskulSiswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ekstrakurikulers()
    {
        return $this->belongsTo(Ekskul::class, 'ekskul', 'ekskul_id');
    }

    public function kontrak_semesters()
    {
        return $this->belongsTo(KontrakSemester::class, 'kontrak_siswa', 'kontrak_semester_id');
    }
}

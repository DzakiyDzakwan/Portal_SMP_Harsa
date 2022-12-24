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
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    use HasFactory;

    protected $primaryKey = 'tahun_ajaran_id';

    protected $guarded = [
        'tahun_ajaran_id',
        'created_at',
        'updated_at'
    ];
}

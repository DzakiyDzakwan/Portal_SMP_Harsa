<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SesiPenilaian extends Model
{
    use HasFactory;

    protected $guarded = [
        "sesi_id",
        "created_at",
        "updated_at"
    ];
}

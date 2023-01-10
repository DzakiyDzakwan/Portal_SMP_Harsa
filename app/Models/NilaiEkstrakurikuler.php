<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiEkstrakurikuler extends Model
{
    use HasFactory;

    protected $guarded = [
        'nilai_ekstrakurikuler_id',
        'created_at',
        'updated_at'
    ];
}

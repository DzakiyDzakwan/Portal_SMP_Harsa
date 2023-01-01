<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MapelGuru extends Model
{
    use HasFactory, softDeletes;

    protected $primaryKey = 'mapel_guru_id';

    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    public function setUpdatedAtAttribute($value)
    {
        // to Disable updated_at
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MapelGuru extends Model
{
    use HasFactory, softDeletes;

    protected $guarded = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function setUpdatedAtAttribute($value)
    {
        // to Disable updated_at
    }
}

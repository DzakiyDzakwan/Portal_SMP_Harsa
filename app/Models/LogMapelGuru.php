<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogMapelGuru extends Model
{
    use HasFactory, sofDeletes;

    protected $guarded = [
        'created_at',
        'updated_at'
    ];
}

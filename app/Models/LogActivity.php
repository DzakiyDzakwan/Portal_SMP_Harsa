<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
    ];

        public function setUpdatedAtAttribute($value)
    {
        // to Disable updated_at
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use HasFactory;

    protected $primaryKey = 'kelas_id';

    protected $guarded = [
        'created_at',
        'updated_at'
    ];


    public function rosters()
    {
        return $this->hasMany(RosterKelas::class, 'kelas', 'kelas_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SesiPenilaian extends Model
{
    use HasFactory;

    protected $primaryKey = 'sesi_id';

    protected $guarded = [
        "sesi_id",
        "created_at"
    ];

    const updated_at = 'null';

    /**
     * Get all of the nilais for the SesiPenilaian
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nilais()
    {
        return $this->hasMany(Comment::class, 'sesi', 'sesi_id');
    }

}

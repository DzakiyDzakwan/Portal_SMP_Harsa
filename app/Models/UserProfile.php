<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProfile extends Model
{
    use HasFactory;

    protected $guarded = [
        'profile_id',
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'user',
        'nama',
        'jenis_kelamin',
        
    ];
    /**
     * Get the user that owns the UserProfile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo(User::class, 'user', 'uuid');
    }
}

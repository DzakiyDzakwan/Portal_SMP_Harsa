<?php

namespace App\Models;

use App\Traits\Uuids;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Uuids, softDeletes, HasRoles;

    protected $primaryKey = 'uuid';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'uuid',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the table associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profiles()
    {
        return $this->hasOne(UserProfile::class, 'user', 'uuid');
    }
    
    public function gurus()
    {
        return $this->hasOne(Guru::class, 'user', 'uuid');
    }

    public function siswas()
    {
        return $this->hasOne(Siswa::class, 'user', 'uuid');
    }
    
    public function nilais()
    {
        return $this->hasMany(Comment::class, 'pemeriksa', 'uuid');
    }

}


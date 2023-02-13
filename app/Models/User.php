<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'status' => 'boolean'
    ];

    public function fullName() : string
    {
        return ($this->info) ? $this->info->surname . ' '. $this->name : $this->name;
    }

    public function isMale () : bool
    {
        return $this->sex == 'male';
    }

    public function gender () : string
    {
        return $this->sex == 'male' ? 'Мужской' : 'Женский';
    }

    public function addresses () : HasMany
    {
        return $this->hasMany(UserAddress::class);
    }

    public function info () : HasOne
    {
        return $this->hasOne(UserInfo::class);
    }

    public function returnings () : HasMany
    {
        return $this->hasMany(Returning::class);
    }

    public function orders () : HasMany
    {
        return $this->hasMany(Order::class);
    }

//    public function hasRole($role)
//    {
//        return $this->where('role', $role)->get();
//    }

    public function isAdmin () : bool
    {
        return $this->role === 'admin';
    }

    public function favorites ()
    {
        return $this->hasMany(Favorite::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressCity extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'name' => 'object',
        'coordinates' => 'object',
    ];

    public function getNameLocalAttribute()
    {
        return $this->name->{app()->getLocale()};
    }

    public function addresses()
    {
        return $this->hasMany(Address::class, 'city_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'name' => 'object',
        'info' => 'object',
        'phones' => 'array',
        'brands' => 'array',
        'coordinates' => 'object',
    ];

    public function getNameLocalAttribute()
    {
        return $this->name->{app()->getLocale()};
    }

    public function getInfoLocalAttribute()
    {
        return $this->info->{app()->getLocale()};
    }

    public function getBrandsModelsAttribute()
    {
        $brands_ids = $this->brands ?? [];
        return BrandDescription::whereIn('id', $brands_ids)->get();
    }

    public function getAllBrandsModelsAttribute()
    {
        return BrandDescription::all();
    }

    public function city()
    {
        return $this->belongsTo(AddressCity::class, 'city_id');
    }
}

<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandDescription extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'brand_descriptions';

    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ],
        ];
    }

    public function getLogoPathAttribute()
    {
        return url('i/'. $this->logo);
    }

}

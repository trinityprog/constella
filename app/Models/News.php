<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getLogoPathAttribute()
    {
        return url('i/'. $this->logo);
    }

    public function getBannerPathAttribute()
    {
        return url('i/'. $this->banner);
    }

    public function getImagePathAttribute()
    {
        return url('i/'. $this->image);
    }

    public function images()
    {
        return $this->belongsToMany(NewImage::class)->withPivot('order')->orderBy('order');
    }
}

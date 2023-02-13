<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewImage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getImagePathAttribute()
    {
        return url('i/'. $this->image);
    }

    public function new()
    {
        return $this->belongsToMany(News::class);
    }
}

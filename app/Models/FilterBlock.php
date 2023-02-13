<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilterBlock extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'filter_blocks';

    protected $guarded = [];

    public function sluggable() : array
    {
        return [
            'slug' => [
                'source' => 'value'
            ]
        ];
    }
}

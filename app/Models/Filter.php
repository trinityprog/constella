<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'filters';

    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public static function filterId($type) : int
    {
        return (Filter::where('type', $type)->exists()) ? Filter::where('type', $type)->first()->id : 0;
    }
}

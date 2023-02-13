<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Menu extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'menu';

    protected $guarded = [];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function sluggable() : array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function category () : HasOne
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function products () : HasMany
    {
        return $this->hasMany(Product::class, 'menu_id', 'id');
    }

    public function getName () {
        $lg = app()->getLocale();

        if($lg === 'kz' && !empty($this->name_kz)) {
            return $this->name_kz;
        }elseif($lg === 'en' && !empty($this->name_en)) {
            return $this->name_en;
        }else {
            return $this->name;
        }
    }
}

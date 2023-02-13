<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionCollections extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getTitleLocalAttribute()
    {
        return app()->getLocale() == 'en' ? $this->title_en : (app()->getLocale() == 'kz' ? $this->title_kz : $this->title);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function blocks()
    {
        return $this->hasMany(BlockCollection::class);
    }
}

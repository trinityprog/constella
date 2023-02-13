<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getTitleLocalAttribute()
    {
        return app()->getLocale() == 'en' ? $this->title_en : (app()->getLocale() == 'kz' ? $this->title_kz : $this->title_ru);
    }

    public function getTextLocalAttribute()
    {
        return app()->getLocale() == 'en' ? $this->text_en : (app()->getLocale() == 'kz' ? $this->text_kz : $this->text_ru);
    }

    public function getAddressLocalAttribute()
    {
        return app()->getLocale() == 'en' ? $this->address_en : (app()->getLocale() == 'kz' ? $this->address_kz : $this->address_ru);
    }

    public function career_category()
    {
        return $this->belongsTo(CareerCategory::class, 'category_id');
    }

    public function resume()
    {
        return $this->hasMany(Resume::class);
    }
}

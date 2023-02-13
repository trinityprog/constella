<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Type extends Model
{
    use HasFactory;

    protected $table = 'types';

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
        static::saved(fn() => Cache::forget('types'));
        static::deleted(fn() => Cache::forget('types'));
    }

    public function categories ()
    {
        return $this->hasMany(Category::class);
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

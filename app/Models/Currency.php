<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Currency extends Model
{
    use HasFactory;

    protected $table = 'currencies';

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
        static::saved(fn() => Cache::forget('currencies'));
        static::deleted(fn() => Cache::forget('currencies'));
    }
}

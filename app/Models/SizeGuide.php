<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizeGuide extends Model
{
    use HasFactory;

    protected $table = 'sizeguides';

    protected $guarded = [];

    public static function getSizeFile ($id) {
        $size = SizeGuide::whereIn('menu_ids', [$id])->first();

        if(app()->getLocale() === 'ru') {
            $filename = $size->filename.'_ru.pdf';
        }elseif (app()->getLocale() === 'en') {
            $filename = $size->filename.'_en.pdf';
        }elseif(app()->getLocale() === 'kz') {
            $filename = $size->filename.'_kz.pdf';
        }else {
            $filename = $size->filename.'_ru.pdf';
        }

        return $filename;
    }
}

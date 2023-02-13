<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $table = 'colors';

    protected $guarded = [];

    public function getName () {
        $lg = app()->getLocale();

        if($lg === 'ru' && !empty($this->name_ru)) {
            return $this->name_ru;
        }elseif($lg === 'en' && !empty($this->name_en)) {
            return $this->name_en;
        }elseif($lg === 'kz' && !empty($this->name_kz)) {
            return $this->name_kz;
        }else {
            return $this->name;
        }
    }
}

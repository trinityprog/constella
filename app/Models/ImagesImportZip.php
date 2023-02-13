<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagesImportZip extends Model
{
    use HasFactory;

    protected $guarded = [];

    public const NOT_STARTED = 0;
    public const IN_PROGRESS = 1;
    public const COMPLETED = 2;

    public const ZIP_ERROR = 3;
    public const NOT_FOUND_IMAGES = 4;

    public function getStatusTextAttribute()
    {
        $arr_text = [
            self::NOT_STARTED => 'Не начато',
            self::IN_PROGRESS => 'В ходе выполнения',
            self::COMPLETED => 'Завершенный',

            self::ZIP_ERROR => 'Ошибка архива',
            self::NOT_FOUND_IMAGES => 'Не найдены изображения',
        ];

        return $arr_text[$this->status];
    }
}

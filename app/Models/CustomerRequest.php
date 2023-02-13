<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomerRequest extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getTypeNameAttribute()
    {
        if($this->type == 'call') return 'Личный звонок';
        if($this->type == 'video') return 'Видео Консультация';
        return 'Напишите нам';
    }

    public function theme(): BelongsTo
    {
        return $this->belongsTo(CustomerRequestTheme::class, 'theme_id');
    }
}

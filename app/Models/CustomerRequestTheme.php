<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CustomerRequestTheme extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getNameAttribute()
    {
        $lang = app()->getLocale() ?? 'ru';
        return $this->{'name_' . $lang};
    }

    public function requests(): HasMany
    {
        return $this->hasMany(CustomerRequest::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'banners';

    protected $guarded = [];

    public function type (): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}

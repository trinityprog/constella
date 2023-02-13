<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'is_main' => 'boolean'
    ];

    public function getImagePathAttribute()
    {
        return url('i/products/images/'. $this->image);
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

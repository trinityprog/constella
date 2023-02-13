<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCharacteristic extends Model
{
    use HasFactory;

    protected $table = 'products_characterstics';

    protected $guarded = [];

    public function product ()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
    use HasFactory;

    protected $table = 'order_products';

    protected $guarded = [];

    public function product ()
    {
        return $this->belongsTo(Product::class);
    }

    public function options ($option)
    {
        $data = json_decode($this->options)->$option;

        if($option == 'size' && $data == 'one') return 'One size';

        if($option == 'color' && $data == 'one color') return 'One color';

        return $data;
    }
}

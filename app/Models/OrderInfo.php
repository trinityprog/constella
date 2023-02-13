<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderInfo extends Model
{
    use HasFactory;

    protected $table = 'order_infos';

    protected $guarded = [];

    public function address ()
    {
        return $this->hasOne(UserAddress::class, 'id', 'delivery_address_id');
    }
}

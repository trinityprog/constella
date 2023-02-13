<?php

namespace App\Models;

use App\Services\CartService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Cookie;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $guarded = [];

    public function displayStatus () : string
    {
        $statuses = [
            0 => 'Не оплачен',
            1 => 'Заказ в обработке',
            2 => 'Заказ собран',
            3 => 'Заказ отправлен',
            4 => 'Завершен',
            5 => 'Возврат',
            6 => 'Заказ оплачен',
            7 => 'Возврат завершен',
        ];

        return $statuses[$this->status];
    }

    public function info () : HasOne
    {
        return $this->hasOne(OrderInfo::class);
    }

    public function products () : HasMany
    {
        return $this->hasMany(OrderProducts::class);
    }

    public function user () : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getFullSumm () : int
    {
        $sum = 0;
        $currency = strtoupper(Cookie::get('currency'));
        $currencyModel = Currency::where('code', $currency)->first();

        foreach($this->products as $product) {
            $price = CartService::formatCurrency($product->count * $product->price, true, $product->product->currency_id);
            $price = CartService::discountPromocode($price, $product->product, optional($this->promocode)->code, false);
            $sum += $price;
        }

        if(!empty($this->info->package_price)) {
            $sum += $this->info->package_price / $currencyModel->value;
        }

        if(!empty($this->info->delivery_price)) {
            $sum += $this->info->delivery_price / $currencyModel->value;
        }

        return round($sum);
    }

    public function payment (): HasOne
    {
        return $this->hasOne(Payment::class, 'order_id', 'id');
    }

    public function promocode (): BelongsTo
    {
        return $this->belongsTo(Promocode::class);
    }

    public function currency (): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }
}

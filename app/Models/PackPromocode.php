<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackPromocode extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'expiration' => 'object',
        'discount' => 'object',
        'relation' => 'object'
    ];

    public function getDiscountCurrencyAttribute()
    {
        return Currency::query()->findOrFail($this->discount->currency_id);
    }

    public function getExpirationStartAttribute()
    {
        return Carbon::parse($this->expiration->start);
    }

    public function getExpirationEndAttribute()
    {
        return Carbon::parse($this->expiration->end);
    }

    public function getDiscountTextAttribute()
    {
        if ($this->discount->type == 'percent') {
            return '-' . $this->discount->percent . '%';
        } else {
            return '-' . $this->discount->price . $this->discountCurrency->symbol;
        }
    }

    public function getQuantityTypeTextAttribute()
    {
        $text = '';
        $text .= $this->type == 'one' ? 'Один на определенный срок' : 'Одноразовыe промокоды';
        $text .= '<br>';
        $text .= $this->type == 'one' ? $this->expirationStart->format('d.m.Y') . ' - ' . $this->expirationEnd->format('d.m.Y') : $this->quantity . 'шт.';

        return $text;
    }

    public function getRelationTypeTextAttribute()
    {
        if($this->relation->type == 'sex') {
            switch ($this->relation->name) {
                case 'Женский': return 'Женского пола';
                case 'Мужской': return 'Мужского пола';
                case 'Детский': return 'Для детей';
            }
        }
        if($this->relation->type == 'category') {
            return 'Категория "' . $this->relation->name . '"';
        }
        if($this->relation->type == 'brand') {
            return 'Бренд "' . $this->relation->name . '"';
        }
        if($this->relation->type == 'collection') {
            return 'Коллекция "' . $this->relation->name . '"';
        }
        return 'Любой';
    }

    public function getCountOfUsesAttribute()
    {
        return $this->promocodes->loadCount('orders')->sum('orders_count') . ' / ' . $this->quantity;
    }

    public function promocodes()
    {
        return $this->hasMany(Promocode::class, 'pack_id');
    }
}

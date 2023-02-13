<?php

namespace App\Services;

use App\Models\Currency;
use App\Models\Product;
use App\Models\Promocode;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;

class CartService {
    public static function formatCurrency($price, $withoutSign = false, $productCurrency = null, $currency = null)
    {
        $currency = $currency ?? strtoupper(Cookie::get('currency'));
        $currencyModel = Cache::get('currencies')->where('code', $currency)->first();
        $priceWithout = $price;
        $priceCurrencied = 0;

        if($productCurrency) {
            $innerCurrency = Cache::get('currencies')->where('id', $productCurrency)->first();
            $priceCurrencied = $price * $innerCurrency->value;
        }

        if($currency === 'RUB' || $currency === 'KZT' || $currency === 'EUR') {
            $priceWithout = ($priceCurrencied) ? round($priceCurrencied / $currencyModel->value) : round($price / $currencyModel->value);
            $price = number_format(round(($priceCurrencied) ? ($priceCurrencied / $currencyModel->value) : ($price / $currencyModel->value)), 0, ' ', ' '). ' '. $currencyModel->symbol;
        }

        if($currency === 'USD') {
            $priceWithout = ($priceCurrencied) ? round($priceCurrencied / $currencyModel->value) : round($price / $currencyModel->value);
            $price = $currencyModel->symbol.' '.number_format(round(($priceCurrencied) ? ($priceCurrencied / $currencyModel->value) : ($price / $currencyModel->value)), 0, ' ', ' ');
        }

        if($withoutSign) return $priceWithout;

        return $price;
    }

    public static function formatPromocodePrice($promocodePrice, $promocodeCurrencyModel)
    {
        $currency = strtoupper(Cookie::get('currency')) ?? 'KZT';
        $currencyModel = Cache::get('currencies')->where('code', $currency)->first();

        $promocodePriceCurrencied = $promocodePrice * $promocodeCurrencyModel->value;

        return round($promocodePriceCurrencied / $currencyModel->value);
    }

    public static function discountPromocode($price, $product, $promocode, $expired = true)
    {
        $promocodeModel = Promocode::query()->where('code', $promocode)->first();

        if(! Promocode::checkProductRelated($product, $promocode, $expired)) return $price;
        if(! $promocodeModel) return $price;

        if($promocodeModel->pack->discount->type == 'percent') {
            return $price * (100 - $promocodeModel->pack->discount->percent) / 100;
        } elseif ($promocodeModel->pack->discount->type == 'price') {
            return $price - self::formatPromocodePrice($promocodeModel->pack->discount->price, $promocodeModel->pack->discountCurrency);
        } else return $price;
    }

    public static function formatTotal ($total) {
        $currency = strtoupper(Cookie::get('currency'));
        $currencyModel = Cache::get('currencies')->where('code', $currency)->first();

        if($currency === 'RUB' || $currency === 'KZT' || $currency === 'EUR') {
            $price = number_format(round($total), 0, ' ', ' '). ' '. $currencyModel->symbol;
        }

        if($currency === 'USD') {
            $price = $currencyModel->symbol.' '.number_format(round($total), 0, ' ', ' ');
        }

        return $price;
    }



    public static function getTotal ($format = false, $promocode = null) {
        $cart = Cart::content();
        $total = 0;

        foreach($cart as $product) {
            $p = Product::query()->find($product->id);
            $price = self::formatCurrency($p->price * $product->qty, true, $p->currency_id);
            $price = self::discountPromocode($price, $p, $promocode);
            $total += round($price);
        }

        return $format ? $total : self::formatTotal($total);
    }

    public function add ($product, $amount, $options = null): array
    {
        $pd = Product::find($product);

        $added = Cart::add([
            'id' => $pd->id,
            'name' => $pd->name,
            'qty' => $amount,
            'price' => $pd->price,
            'options' => $options
        ])->associate('App\Models\Product');

        $product = [
            'uuid' => $added->rowId,
            'name' => $pd->displayName(),
            'price' => self::formatCurrency($pd->price, false, $pd->currency_id),
            'image' => $pd->poster(),
            'options' => [
                'color' => $added->options->color,
                'size' => ($added->options->size == 'one') ? 'One size' : $added->options->size
            ]
        ];

        return [
            'status' => ($added) ? true : false,
            'count' => Cart::count(),
            'total' => self::getTotal(),
            'product' => $product
        ];
    }

    public function update ($product, $qty): array
    {
        $upd = Cart::update($product, $qty);

        return [
            'status' => ($upd) ? true : false,
            'total' => self::getTotal(),
            'count' => Cart::count(),
            'product' => $upd
        ];
    }

    public function remove ($product): array
    {
        $rm = Cart::remove($product);

        return [
            'status' => ($rm) ? true : false,
            'total' => self::getTotal(),
            'count' => Cart::count(),
        ];
    }

    public function clear ()
    {
        return Cart::destroy();
    }
}

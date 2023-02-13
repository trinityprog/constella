<?php

namespace App\View\Components;

use App\Models\Currency;
use App\Services\CartService;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\Component;

class Price extends Component
{
    public $price;
    public $productCurrency;
    public $currency;

    public function __construct($price, $productCurrency = null, $currency = null)
    {
        $this->price = $price;
        $this->productCurrency = $productCurrency;
        $this->currency = $currency;
    }

    public function render()
    {
        $this->price = CartService::formatCurrency($this->price, false, $this->productCurrency, $this->currency);
        return view('components.price');
    }
}

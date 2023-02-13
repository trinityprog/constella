<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductItem extends Component
{
    public $product;

    public function __construct($product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('components.product-item');
    }
}

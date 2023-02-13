<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\View\Component;

class FavoriteProduct extends Component
{
    public $product;

    public function __construct($product)
    {
        $this->product = $product;
    }

    public function render()
    {
        $data = collect();

        $attributes = $this->groupingСharacteristics($this->product);

        $data->put('attributes', $attributes);

        return view('components.favorite-product', compact('data'));
    }

    public function groupingСharacteristics($product)
    {
        $attributesArr = [];
        $parentedProducts = Product::query()
            ->when(
                $product->brand == 'Damiani',
                fn($q) => $q->where('parent_vendor_code', $product->parent_vendor_code),
                fn($q) => $q->where('vendor_code', $product->vendor_code)
            )
            ->get();

        foreach($parentedProducts as $prod) {
            $color = $prod->getCharacteristic('color')
                ?? $prod->getCharacteristic('metal_color')
                ?? 'one color';
            $size = $prod->getCharacteristic('size') ?? 'one size';

            $attributesArr['colors'] [$color]= $prod->id;
            $attributesArr['sizes'] [$size]= $prod->id;
        }

        return collect($attributesArr)->recursive();
    }
}

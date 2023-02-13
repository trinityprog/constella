<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function show ($id)
    {
        $product = Product::findOrFail($id);

        $attributes = $this->groupingСharacteristics($product);

        return view('partials.product_preview', compact('product', 'attributes'));
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

    public function favorite (Request $request)
    {
        $data = $request->all();

        if ($prevFavorite = Favorite::where('user_id', $data['userId'])->where('product_id', $data['productId'])->first()) {
            return $prevFavorite->delete();
        }

        return Favorite::create([
            'user_id' => $data['userId'],
            'product_id' => $data['productId']
        ]);
    }
}

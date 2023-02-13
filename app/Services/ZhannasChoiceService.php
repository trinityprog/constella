<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Menu;
use App\Models\ZhannasChoice;
use Illuminate\Support\Facades\Cache;

class ZhannasChoiceService {
    public static function get ($category) {
        $products = ZhannasChoice::query()
            ->with(['product', 'product.images', 'product.currency', 'product.characteristics', 'category', 'menu'])
            ->whereHas('product')
            ->when($category != 'all',
                fn($q) => $q->whereHas('category', fn($q) => $q->where('slug', $category))
                    ->orWhereHas('menu', fn($q) => $q->where('slug', $category))
            )
            ->take(4)
            ->get();


        return [
            'products' => $products->map(fn($item) => [
                    'id' => $item->id,
                    'image' =>  optional($item->product)->poster(),
                    'category' => optional($item->category)->name ?? optional($item->menu)->name,
                    'title' => optional($item->product)->displayName(),
                    'price' => optional($item->product)->price,
                    'currency' => optional($item->product)->currency,
                    'url' => $item->product ? route('page.product',$item->product->slug) : '',
                ])->toArray()
        ];
    }
}

<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\CatalogPageService;


class YouthProducts extends Controller
{
    public function index (CatalogPageService $catalogPageService)
    {
        $products = Product::query()
            ->whereHas('images')
            ->whereHas('youth')
            ->with(['category'])
            ->groupBy('vendor_code')
            ->paginate(12);

        $data['choice'] = $catalogPageService->bestProducts();

        return view('pages.youth_products', compact('products', 'data'));
    }
}

<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\CatalogPageService;
use Illuminate\Http\Request;

class CatalogPage extends Controller
{
    public $service;

    public function __construct()
    {
        $this->service = new CatalogPageService();
    }

    public function index (Request $request, $sex = null, $category = null)
    {
        $data = $this->service->get($sex, $category, $request);
        return view('pages.catalog', compact('data'));
    }

    public function show ($slug)
    {
        $data = $this->service->getProduct($slug);

        $product = Product::where('slug', $slug)->firstOrFail();

        $product->increment('views');

        return view('pages.product', compact('data'));
    }

    public function updateAttributes(Product $product, $type, $value)
    {
        $data = $this->service->updateAttributes($product, $type, $value);

        return response()->json([
            'colors' => view('partials.updated-attribute-colors', compact('data'))->render(),
            'sizes' => view('partials.updated-attribute-sizes', compact('data'))->render(),
        ]);
    }
}

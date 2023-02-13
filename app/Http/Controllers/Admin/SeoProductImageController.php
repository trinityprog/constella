<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class SeoProductImageController extends Controller
{
    public function index(Request $request)
    {
        $request->validate(['product_id' => 'exists:products,id']);

        $product = Product::query()
            ->with('images')
            ->findOrFail($request->product_id);

        $productImages = $product->images;

        return view('admin.seo-product-images.index', compact('productImages'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $image = ProductImage::query()->findOrFail($id);

        return view('admin.seo-product-images.edit', compact('image'));
    }

    public function update(Request $request, $id)
    {
        $image = ProductImage::query()->findOrFail($id);

        $data = $request->validate([
            'alt_tag' => 'string|nullable',
        ]);

        $image->update($data);

        return redirect()->route('admin.seo_products.index')->with('flash_message', 'SEO изменено!');
    }

    public function destroy($id)
    {
        //
    }
}

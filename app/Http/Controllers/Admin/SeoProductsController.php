<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SeoProductsController extends Controller
{

    public function index(Request $request)
    {
        $products = Product::query()
            ->with('currency')
            ->when(
                $request->has('search') && $request->filled('search'),
                fn($q) => $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('vendor_code', 'like', '%' . $request->search . '%')
                    ->orWhere('parent_vendor_code', 'like', '%' . $request->search . '%')
            )
            ->latest()
            ->paginate(10);

        return view('admin.seo_products.index', compact('products'));
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
        $product = Product::query()->findOrFail($id);
        return view('admin.seo_products.show', compact('product'));
    }


    public function edit($id)
    {
        $product = Product::query()->findOrFail($id);
        return view('admin.seo_products.edit', compact('product'));
    }


    public function update(Request $request, $id)
    {
        $product = Product::query()->findOrFail($id);

        $data = $request->validate([
            'title' => 'string|nullable',
            'seo_description' => 'string|nullable',
            'H1' => 'string|nullable',
            'H2' => 'string|nullable',
            'H3' => 'string|nullable',
            'H4' => 'string|nullable',
            'H5' => 'string|nullable',
            'H6' => 'string|nullable',
            'keywords' => 'string|nullable',
            'H1_seo_text' => 'string|max:5000|nullable',
            'H2_seo_text' => 'string|max:5000|nullable',
            'H3_seo_text' => 'string|max:5000|nullable',
            'H4_seo_text' => 'string|max:5000|nullable',
            'H5_seo_text' => 'string|max:5000|nullable',
            'H6_seo_text' => 'string|max:5000|nullable',
        ]);

        if ($data === null) {
            $product->update([
                'title' => ' ',
                'seo_description' => ' ',
                'H1' => ' ',
                'H2' => ' ',
                'H3' => ' ',
                'H4' => ' ',
                'H5' => ' ',
                'H6' => ' ',
                'keywords' => ' ',
                'H1_seo_text' => ' ',
                'H2_seo_text' => ' ',
                'H3_seo_text' => ' ',
                'H4_seo_text' => ' ',
                'H5_seo_text' => ' ',
                'H6_seo_text' => ' ',
            ]);
        } else {
            $product->update($data);
        }

        return redirect()->route('admin.seo_products.index')->with('flash_message', 'SEO изменено!');
    }


    public function destroy($id)
    {
        //
    }
}

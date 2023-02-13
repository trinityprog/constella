<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductImageController extends Controller
{
    public function index(Request $request)
    {
        $productImages = ProductImage::where('product_id', $request->get('product_id'))->paginate(10);
        return view('admin.product-images.index', compact('productImages'));
    }

    public function create()
    {
        return view('admin.product-images.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'image' => 'required|image'
        ]);

        $image = $request->file('image')->store('products/images', 'public');
        $image = str_replace('products/images/', '', $image);
        ProductImage::create([
            'product_id' => $request->input('product_id'),
            'name' => $image,
            'is_main' => $request->input('is_main') ? 1 : 0,
        ]);

        return redirect('admin/products-images?product_id='.$request->get('product_id'))->with('flash_message', 'Изображение добавлено!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $image = ProductImage::find($id);
        File::delete(public_path('i/products/images' . $image->name));
        $image->delete();

        return back()->with('flash_message', 'Изображение удалено!');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Product;
use App\Models\YouthProduct;
use Illuminate\Http\Request;

class YouthProductsController extends Controller
{
    public function index()
    {
        $youth_products = YouthProduct::paginate(10);
        return view('admin.youth_products.index', compact('youth_products'));
    }


    public function create()
    {
        $products = Product::all();
        $categories = Category::all();
        $menu = Menu::all();
        return view('admin.youth_products.create', compact('products', 'categories', 'menu'));
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');

        if(str_contains($data['category_id'], 'menu')) {
            YouthProduct::create([
                'product_id' => $data['product_id'],
                'menu_id' => explode('-', $data['category_id'])[1]
            ]);
        }

        if(str_contains($data['category_id'], 'category')) {
            YouthProduct::create([
                'product_id' => $data['product_id'],
                'category_id' => explode('-', $data['category_id'])[1]
            ]);
        }

        return redirect()->route('admin.youth-products.index');
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
        $choice = YouthProduct::find($id);
        $choice->delete();
        return back()->with('flash_message', 'Номенклатура удалена с выбора Жанны!');
    }
}

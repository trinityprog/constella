<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Product;
use App\Models\ZhannasChoice;
use File;
use Illuminate\Http\Request;

class ZhannasController extends Controller
{
    public function index(Request $request)
    {
        $zhannas = ZhannasChoice::query()
            ->when(
                $request->has('search') && $request->filled('search'),
                fn($q) => $q->whereHas('product', fn($q) => $q->where('name', 'like', '%' . $request->search . '%'))
                    ->orWhereHas('category', fn($q) => $q->where('name', 'like', '%' . $request->search . '%'))
            )
            ->paginate(10);

        $rename_categoryJson = File::get(database_path('files/catalog-rename-category.json'));
        $rename_category = json_decode($rename_categoryJson, true);

        return view('admin.zhannas.index', compact('zhannas', 'rename_category'));
    }


    public function create()
    {
        $products = Product::all();
        $categories = Category::all();
        $menu = Menu::all();
        return view('admin.zhannas.create', compact('products', 'categories', 'menu'));
    }

    public function rename(Request $request)
    {
        $request->validate([
           'rename_ru' => 'required',
           'rename_kz' => 'required',
           'rename_en' => 'required',
        ]);

        $rename_category = [
            'ru' => $request->rename_ru,
            'kz' => $request->rename_kz,
            'en' => $request->rename_en,
        ];

        File::put(database_path('files/catalog-rename-category.json'), json_encode($rename_category, JSON_UNESCAPED_UNICODE));

        return redirect('/admin/zhannas');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');

        if(str_contains($data['category_id'], 'menu')) {
            ZhannasChoice::create([
                'product_id' => $data['product_id'],
                'menu_id' => explode('-', $data['category_id'])[1]
            ]);
        }

        if(str_contains($data['category_id'], 'category')) {
            ZhannasChoice::create([
                'product_id' => $data['product_id'],
                'category_id' => explode('-', $data['category_id'])[1]
            ]);
        }

        return redirect('/admin/zhannas');
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
        $choice = ZhannasChoice::find($id);
        $choice->delete();
        return back()->with('flash_message', 'Товар удален из выбора Жанны!');
    }
}

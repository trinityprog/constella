<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menu = Menu::paginate(10);
        return view('admin.menu.index', compact('menu'));
    }

    public function create()
    {
        $categories = Category::where('parent', '!=', 0)->get()->groupBy('parent');
        return view('admin.menu.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'exists:categories,id',
            'name' => 'required',
            'name_en' => 'string',
            'name_kz' => 'string',
        ]);

        Menu::create($data);

        return redirect('/admin/menu')->with('flash_message', 'Категория в меню добавлена!');
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
        //
    }
}

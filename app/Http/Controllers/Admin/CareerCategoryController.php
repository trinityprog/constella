<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareerCategory;
use Illuminate\Http\Request;

class CareerCategoryController extends Controller
{
    public function create()
    {
        return view('admin.career.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'name_en' => 'string',
            'name_kz' => 'string',
            'order' => 'integer',
        ]);

        CareerCategory::create($data);

        return redirect()->route('admin.career.index')->with('flash_message', 'Категория добавлена!');
    }

    public function edit($id)
    {
        $category = CareerCategory::query()->findOrFail($id);
        return view('admin.career.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = CareerCategory::query()->findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string',
            'name_en' => 'string',
            'name_kz' => 'string',
            'order' => 'integer',
        ]);

        $category->update($data);

        return redirect()->route('admin.career.index')->with('flash_message', 'Категория изменено!');
    }

    public function destroy($id)
    {
        $categories = CareerCategory::findOrFail($id);
        $categories->delete();
        return back()->with('flash_message', 'Категория удалена!');
    }
}

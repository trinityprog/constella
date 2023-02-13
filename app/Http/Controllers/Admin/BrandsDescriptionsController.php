<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrandDescription;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrandsDescriptionsController extends Controller
{
    public function index(Request $request)
    {
        $brand_description = BrandDescription::query()
            ->when(
                $request->has('search') && $request->filled('search'),
                fn($q) => $q->where('name', 'like', '%' . $request->search . '%')
            )
        ->paginate(12);
        return view('admin.brand_description.index', compact('brand_description'));
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
        $brand_description = BrandDescription::find($id);
        return view('admin.brand_description.edit', compact('brand_description'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'file',
            'logo' => 'file',
            'description' => 'required',
            'category' => 'required',
        ]);

        $brand = BrandDescription::find($id);

        $stored_data = [
            'description' => $request->input('description'),
            'category' => $request->input('category')
        ];

        if ($request->has('image')) {
            $image = $request->file('image')->store('brands', 'public');
            $stored_data['image'] = $image;
        }

        if ($request->has('logo')) {
            $logo = $request->file('logo')->store('brands', 'public');
            $stored_data['logo'] = $logo;
        }

        $brand->update($stored_data);

        return redirect('/admin/brands-descriptions')->with('flash_message', 'Описние бренда успешно обновлено!');
    }

    public function destroy($id)
    {
        $brandD = BrandDescription::find($id);
        File::delete(public_path('i/' . $brandD->logo));
        File::delete(public_path('i/' . $brandD->image));
        $brandD->delete();
        return back()->with('flash_message', 'Описание бренда удалено!');
    }
}

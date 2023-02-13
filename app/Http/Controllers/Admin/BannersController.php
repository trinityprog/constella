<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Slide;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BannersController extends Controller
{
    public function index()
    {
        $banners = Banner::paginate(10);
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        $types = Type::all();
        return view('admin.banners.create', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_id' => 'required',
            'm_image' => 'required|file',
            'image' => 'required|file',
            'link' => 'required|url',
            'page' => 'required'
        ]);

        $image = $request->file('image')->store('banners', 'public');
        $m_image = $request->file('m_image')->store('banners', 'public');

        Banner::create([
            'type_id' => $request->input('type_id'),
            'image' => $image,
            'm_image' => $m_image,
            'link' => $request->input('link'),
            'page' => $request->input('page')
        ]);

        return redirect('admin/banners')->with('flash_message', 'Баннер добавлен!');
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        $types = Type::all();
        return view('admin.banners.edit', compact('banner', 'types'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type_id' => 'required',
            'm_image' => 'file',
            'image' => 'file',
            'link' => 'required|url',
            'page' => 'required'
        ]);

        $data = $request->all();
        $banner = Banner::findOrFail($id);

        $stored_data = [
            'type_id' => $request->input('type_id'),
            'link' => $request->input('link'),
            'page' => $request->input('page')
        ];

        if ($request->has('image')) {
            File::delete(public_path('i/' . $banner->image));
            $image = $request->file('image')->store('banners', 'public');
            $stored_data['image'] = $image;
        }

        if ($request->has('m_image')) {
            File::delete(public_path('i/' . $banner->m_image));
            $m_image = $request->file('m_image')->store('banners', 'public');
            $stored_data['m_image'] = $m_image;
        }

        $banner->update($stored_data);

        return redirect()->route('admin.banners.index')->with('flash_message', 'Баннер изменен!');
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        File::delete(public_path('i/'. $banner->image));
        File::delete(public_path('i/'. $banner->m_image));
        $banner->delete();
        return back()->with('flash_message', 'Баннер удален!');
    }
}

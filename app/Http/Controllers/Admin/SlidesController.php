<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use App\Models\Type;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SlidesController extends Controller
{
    public function index()
    {
        $sliders = Slide::paginate(10);
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        $types = Type::all();
        return view('admin.sliders.create', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|file',
            'm_image' => 'required|file',
            'link' => 'required|string',
            'type_id' => 'required',
            'name' => 'nullable'
        ]);

        $data = $request->all();

        $image = $request->file('image')->store('slider', 'public');
        $imageMobile = $request->file('m_image')->store('slider', 'public');

        Slide::create([
            'name' => $data['name'] ?? null,
            'image' => $image,
            'm_image' => $imageMobile,
            'link' => $data['link'],
            'type_id' => $data['type_id'],
            'order' => $data['order']
        ]);

        return redirect('/admin/sliders');
    }

    public function edit($id)
    {
        $slider = Slide::findOrFail($id);
        $types = Type::all();
        return view('admin.sliders.edit', compact('slider', 'types'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'file',
            'm_image' => 'file',
            'link' => 'required|string',
            'type_id' => 'required',
            'name' => 'nullable'
        ]);

        $data = $request->all();
        $slider = Slide::findOrFail($id);

        $stored_data = [
            'name' => $data['name'] ?? null,
            'link' => $data['link'],
            'type_id' => $data['type_id'],
            'order' => $data['order']
        ];

        if ($request->has('image')) {
            File::delete(public_path('i/' . $slider->image));
            $image = $request->file('image')->store('slider', 'public');
            $stored_data['image'] = $image;
        }

        if ($request->has('m_image')) {
            File::delete(public_path('i/' . $slider->m_image));
            $imageMobile = $request->file('m_image')->store('slider', 'public');
            $stored_data['m_image'] = $imageMobile;
        }

        $slider->update($stored_data);

        return redirect('/admin/sliders');
    }

    public function destroy($id): RedirectResponse
    {
        $slider = Slide::findOrFail($id);
        File::delete(public_path('i/' . $slider->image));
        File::delete(public_path('i/' . $slider->m_image));
        $slider->delete();
        return back();
    }
}

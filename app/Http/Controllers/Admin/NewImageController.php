<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewImage;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewImageController extends Controller
{
    public function index(Request $request)
    {
        $request->validate(['new_id' => 'required|exists:news,id']);

        $new = News::query()
            ->with('images')
            ->findOrFail($request->new_id);

        $newImages = $new->images;

        return view('admin.new-images.index', compact('new', 'newImages'));
    }

    public function create(Request $request)
    {
        $request->validate(['new_id' => 'required|exists:news,id']);

        $new = News::query()->findOrFail($request->new_id);

        return view('admin.new-images.create', compact('new'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'new_id' => 'required|exists:news,id',
            'image' => 'required|image',
            'order' => 'integer'
        ]);

        $new = News::query()->findOrFail($request->new_id);

        if($request->hasFile('image')) {
            $image = $request->file('image')->store('news/images', 'public');


            $newImage = NewImage::create([
                'image' => $image,
            ]);
            $new->images()->attach($newImage->id, ['order' => $request->input('order', 1)]);
        }

        return redirect()->route('admin.news-images.index', ['new_id' => $new->id])->with('flash_message', 'Изображение добавлено!');
    }

    public function destroy($id)
    {
        $newImage = NewImage::findOrFail($id);
        File::delete(public_path('i/'. $newImage->image));
        $newImage->delete();

        return back()->with('flash_message', 'Изображение удалено!');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewImage;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()->paginate(7);
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'title_en' => 'string',
            'title_kz' => 'string',
            'text_1' => 'required|string',
            'text_1_en' => 'string',
            'text_1_kz' => 'string',
            'text_2' => 'present',
            'text_2_en' => 'present',
            'text_2_kz' => 'present',
            'logo' => 'image',
            'quote' => 'present',
            'quote_en' => 'present',
            'quote_kz' => 'present',
            'banner' => 'required|image|mimes:jpeg,png,jpg',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'order' => 'integer'
        ]);

        if($request->hasFile('logo')) {
            $image = $request->file('logo')->store('news/images', 'public');

            $data['logo'] = $image;
        }

        if($request->hasFile('banner')) {
            $image = $request->file('banner')->store('news/images', 'public');

            $data['banner'] = $image;
        }

        if($request->hasFile('image')) {
            $image = $request->file('image')->store('news/images', 'public');

            $data['image'] = $image;
        }

        News::create($data);

        return redirect()->route('admin.news.index')->with('flash_message', 'Событие добавлено!');
    }

    public function edit($id)
    {
        $news = News::query()->findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $new = News::query()->findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string',
            'title_en' => 'string',
            'title_kz' => 'string',
            'text_1' => 'required|string',
            'text_1_en' => 'string',
            'text_1_kz' => 'string',
            'text_2' => 'present',
            'text_2_en' => 'present',
            'text_2_kz' => 'present',
            'logo' => 'image',
            'quote' => 'present',
            'quote_en' => 'present',
            'quote_kz' => 'present',
            'banner' => 'image|mimes:jpeg,png,jpg',
            'image' => 'image|mimes:jpeg,png,jpg',
            'order' => 'integer'
        ]);

        if($request->has('logo')) {
            $image = $request->file('logo')->store('news/images', 'public');

            $data['logo'] = $image;
        }

        if($request->has('banner')) {
            $image = $request->file('banner')->store('news/images', 'public');

            $data['banner'] = $image;
        }

        if($request->has('image')) {
            $image = $request->file('image')->store('news/images', 'public');

            $data['image'] = $image;
        }

        $new->update($data);

        return redirect()->route('admin.news.index')->with('flash_message', 'Событие изменено!');
    }

    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();
        return back()->with('flash_message', 'Событие удалено!');
    }
}

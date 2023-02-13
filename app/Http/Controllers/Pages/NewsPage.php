<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\News;
use function view;

class NewsPage extends Controller
{
    public function index()
    {
        $news = News::with('images')->orderBy('order', 'desc')->paginate(4);
        return view('pages.about.news', compact('news'));
    }

    public function show($id)
    {
        $new = News::query()->with('images')->findOrFail($id);

        return view('pages.about.new_page', compact('new'));
    }
}

<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\CareerCategory;
use Illuminate\Http\Request;

class CareerPage extends Controller
{
    public function list ($slug = null)
    {
        $categories = CareerCategory::query()->orderBy('order')->get();

        $career = Career::query()->when(
            $slug,
            function ($q) use ($slug) { $q->whereHas('career_category', function($q) use ($slug) { $q->where('slug', $slug); }); }
            )->paginate(5);

        return view('pages.career.index', compact('categories', 'career'));
    }

    public function index ($id)
    {
        $categories = CareerCategory::query()->orderBy('order')->get();

        $career = Career::query()->findOrFail($id);

        return view('partials.career_page', compact('categories', 'career'));
    }
}

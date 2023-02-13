<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrandDescription;
use App\Models\Career;
use App\Models\CareerCategory;
use App\Models\Resume;
use Illuminate\Http\Request;

class CareerController extends Controller
{

    public function index()
    {
        $categories = CareerCategory::query()->with('career')->orderBy('order')->get();

        $career = $categories->pluck('career')->flatten();

        $resumes = Resume::query()->orderBy('id', 'desc')->get();

        return view('admin.career.index', compact('categories', 'career', 'resumes'));
    }

    public function create()
    {
        $categories = CareerCategory::query()->orderBy('order')->get();

        $brands = BrandDescription::query()
            ->get();

        return view('admin.vacancies.create', compact('categories', 'brands'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_ru' => 'required|string',
            'title_en' => 'string',
            'title_kz' => 'string',
            'text_ru' => 'required|string',
            'text_en' => 'string',
            'text_kz' => 'string',
            'address_ru' => 'string',
            'address_en' => 'string',
            'address_kz' => 'string',
            'order' => 'integer',
            'brand_id' => 'required|exists:brand_descriptions,id',
            'category_id' => 'required|exists:career_categories,id',
        ]);

        Career::create($data);

        return redirect()->route('admin.career.index')->with('flash_message', 'Вакансия добавлена!');
    }

    public function edit($id)
    {
        $career = Career::query()->findOrFail($id);

        $categories = CareerCategory::query()
            ->get();

        $brands = BrandDescription::query()
            ->get();

        return view('admin.vacancies.edit', compact('career', 'brands', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $career = Career::query()->findOrFail($id);

        $data = $request->validate([
            'title_ru' => 'required|string',
            'title_en' => 'string',
            'title_kz' => 'string',
            'text_ru' => 'required|string',
            'text_en' => 'string',
            'text_kz' => 'string',
            'address_ru' => 'string',
            'address_en' => 'string',
            'address_kz' => 'string',
            'order' => 'integer',
            'brand_id' => 'required|exists:brand_descriptions,id',
            'category_id' => 'required|exists:career_categories,id',
        ]);

        $career->update($data);

        return redirect()->route('admin.career.index')->with('flash_message', 'Вакансия изменена!');
    }

    public function destroy($id)
    {
        $career = Career::findOrFail($id);
        $career->delete();
        return back()->with('flash_message', 'Вакансия удалена!');
    }
}

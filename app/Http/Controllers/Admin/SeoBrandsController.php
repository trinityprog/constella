<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrandDescription;
use Illuminate\Http\Request;

class SeoBrandsController extends Controller
{

    public function index()
    {
        $brands = BrandDescription::paginate(10);

        return view('admin.seo_brands.index', compact('brands'));
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
        $brand = BrandDescription::query()->findOrFail($id);
        return view('admin.seo_brands.show', compact('brand'));
    }


    public function edit($id)
    {
        $brand = BrandDescription::query()->findOrFail($id);
        return view('admin.seo_brands.edit', compact('brand'));
    }


    public function update(Request $request, $id)
    {
        $brand = BrandDescription::query()->findOrFail($id);

        $data = $request->validate([
            'title' => 'string|nullable',
            'seo_description' => 'string|nullable',
            'H1' => 'string|nullable',
            'H2' => 'string|nullable',
            'H3' => 'string|nullable',
            'H4' => 'string|nullable',
            'H5' => 'string|nullable',
            'H6' => 'string|nullable',
            'keywords' => 'string|nullable',
            'H1_seo_text' => 'string|max:5000|nullable',
            'H2_seo_text' => 'string|max:5000|nullable',
            'H3_seo_text' => 'string|max:5000|nullable',
            'H4_seo_text' => 'string|max:5000|nullable',
            'H5_seo_text' => 'string|max:5000|nullable',
            'H6_seo_text' => 'string|max:5000|nullable',
        ]);

        if ($data === null) {
            $brand->update([
                'title' => ' ',
                'seo_description' => ' ',
                'H1' => ' ',
                'H2' => ' ',
                'H3' => ' ',
                'H4' => ' ',
                'H5' => ' ',
                'H6' => ' ',
                'keywords' => ' ',
                'H1_seo_text' => ' ',
                'H2_seo_text' => ' ',
                'H3_seo_text' => ' ',
                'H4_seo_text' => ' ',
                'H5_seo_text' => ' ',
                'H6_seo_text' => ' ',
            ]);
        } else {
            $brand->update($data);
        }

        return redirect()->route('admin.seo_brands.index')->with('flash_message', 'SEO изменено!');
    }


    public function destroy($id)
    {
        //
    }
}

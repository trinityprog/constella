<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class SeoMenuController extends Controller
{

    public function index()
    {
        $menu = Menu::paginate(10);

        return view('admin.seo_menu.index', compact('menu'));
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
        $menu = Menu::query()->findOrFail($id);
        return view('admin.seo_menu.show', compact('menu'));
    }


    public function edit($id)
    {
        $menu = Menu::query()->findOrFail($id);
        return view('admin.seo_menu.edit', compact('menu'));
    }


    public function update(Request $request, $id)
    {
        $menu = Menu::query()->findOrFail($id);

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
            $menu->update([
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
            $menu->update($data);
        }

        return redirect()->route('admin.seo_menu.index')->with('flash_message', 'SEO изменено!');
    }


    public function destroy($id)
    {
        //
    }
}

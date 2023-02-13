<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrandDescription;
use App\Models\Category;
use App\Models\SectionCollections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class SectionsCollectionsController extends Controller
{
    public function index()
    {
        $sections = SectionCollections::query()
            ->with(['blocks', 'category'])
            ->get();

        return view('admin.sections-collections.index', compact('sections'));
    }

    public function create()
    {
        $categories = Category::query()
            ->with('type')
            ->where('parent', '!=' , 0)
            ->get();

        return view('admin.sections-collections.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'title_en' => 'string',
            'title_kz' => 'string',
            'page_type' => 'required_without:category_id',
            'category_id' => 'required_without:page_type|exists:categories,id',
            'blocks.*.brand_logo' => 'image|mimes:png,jpeg,jpg',
            'blocks.*.collection' => 'required',
            'blocks.*.url' => 'required|url',
            'blocks.*.image' => 'image|mimes:png,jpeg,jpg',
        ]);

        $section = SectionCollections::create([
            'title' => $data['title'],
            'title_en' => $data['title_en'],
            'title_kz' => $data['title_kz'],
            'page_type' => $data['page_type'],
            'category_id' => $data['category_id'],
        ]);

        foreach ($data['blocks'] as $index => $block) {
            if($request->hasFile('blocks.' . $index . '.brand_logo')) {
                $image = $request->file('blocks.' . $index . '.brand_logo')->store('sections-collections/brand_logo', 'public');
                $block['brand_logo'] = $image;
            }

            if($request->hasFile('blocks.' . $index . '.image')) {
                $image = $request->file('blocks.' . $index . '.image')->store('sections-collections/image', 'public');
                $block['image'] = $image;
            }

            $section->blocks()->create([
                'brand_logo' => $block['brand_logo'],
                'collection' => $block['collection'],
                'url' => $block['url'],
                'image' => $block['image'],
            ]);
        }

        return redirect()->route('admin.sections-collections.index')->with('flash_message', 'Секция добавлена!');
    }

    public function edit($id)
    {
        $section = SectionCollections::query()
            ->with('blocks')
            ->findOrFail($id);

        $categories = Category::query()
            ->with('type')
            ->whereNotNull('parent')
            ->get();

        return view('admin.sections-collections.edit', compact('section', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'title_en' => 'string',
            'title_kz' => 'string',
            'page_type' => 'required_without:category_id',
            'category_id' => 'required_without:page_type|exists:categories,id',
            'blocks.*.brand_logo' => 'image|mimes:png,jpeg,jpg',
            'blocks.*.collection' => 'required',
            'blocks.*.url' => 'required|url',
            'blocks.*.image' => 'image|mimes:png,jpeg,jpg',
        ]);

        $section = SectionCollections::findOrFail($id);

        $section->update([
            'title' => $data['title'],
            'title_en' => $data['title_en'],
            'title_kz' => $data['title_kz'],
            'page_type' => $data['page_type'],
            'category_id' => $data['category_id'],
        ]);

        foreach ($data['blocks'] as $index => $block) {
//            File::delete(public_path('i/' . $block['brand_logo']));
//            File::delete(public_path('i/' . $block['image']));

            if($request->hasFile('blocks.' . $index . '.brand_logo')) {
                $logo = $request->file('blocks.' . $index . '.brand_logo')->store('sections-collections/brand_logo', 'public');
                $block['brand_logo'] = $logo;

                $section->blocks[$index]->update([
                    'brand_logo' => $block['brand_logo'],
                ]);
            }

            if($request->hasFile('blocks.' . $index . '.image')) {
                $image = $request->file('blocks.' . $index . '.image')->store('sections-collections', 'public');
                $block['image'] = $image;

                $section->blocks[$index]->update([
                    'image' => $block['image'],
                ]);
            }

            $section->blocks[$index]->update([
                'collection' => $block['collection'],
                'url' => $block['url'],
            ]);
        }



        return redirect()->route('admin.sections-collections.index')->with('flash_message', 'Секция #' . $section->id . ' изменена!');
    }

    public function destroy($id)
    {
        $section = SectionCollections::findOrFail($id);
        File::delete(public_path('i/'. $section->image));
        $section->delete();
        return back()->with('flash_message', 'Секция удалена!');
    }
}

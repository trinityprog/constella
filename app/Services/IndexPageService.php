<?php

namespace App\Services;

use App\Models\Banner;
use App\Models\BrandDescription;
use App\Models\Filter;
use App\Models\Product;
use App\Models\ProductCharacteristic;
use App\Models\SectionCollections;
use App\Models\Slide;
use App\Models\Type;
use App\Models\ZhannasChoice;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;

class IndexPageService {
    public function get ($category) : Collection
    {
        $collection = collect();

        $types = Cache::get('types');

        $type = $types->where('slug', $category)->first();

        $zhannaProducts = ZhannasChoiceService::get('all');

        $slides = Slide::where('type_id', $type->id)->oldest('order')->get();

        $collection->put('zhannaChoice', $zhannaProducts);


        $sectionСollections = SectionCollections::query()
            ->with('blocks')
            ->where('page_type', 'index_' . $category)
            ->latest()
            ->first();

        $brands = ProductCharacteristic::query()
            ->whereNotNull('brand')
            ->whereHas(
                'product',
                fn($q) => $q->whereHas('images')->whereIn('category_id', [1, 11, 14])
            )
            ->oldest('brand')
            ->get('brand')
            ->unique('brand')
            ->pluck('brand');

        $collection->put('brands', $brands);
        $collection->put('sectionСollections', $sectionСollections);
        $collection->put('slides', $slides);
        $collection->put('category', $category);
        $collection->put('banners', Banner::where('type_id', $type->id)->where('page', 'index')->get());

        return $collection;
    }

    public function getFourProductsBrand($brand)
    {
        return [
          'products' => Product::query()
              ->with(['characteristics', 'images'])
              ->whereHas(
                  'characteristics',
                  fn($q) => $q->where('brand', $brand)
              )
              ->whereHas('images')
              ->limit(4)
              ->inRandomOrder()
              ->get()
              ->map(function($item) {
                  $data['title'] = '<b>'.$item->getCharacteristic('brand').'</b> '. $item->getCharacteristic('product_type');
                  $data['image'] = $item->poster();
                  $data['link'] = route('page.product', $item->slug);
                  return $data;
              }),
            'brand' => $brand,
            'sex' => Cookie::has('sex') ? Cookie::get('sex') : 'female'
        ];
    }
}

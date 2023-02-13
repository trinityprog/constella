<?php

namespace App\Services;

use App\Models\BrandDescription;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Filter;
use App\Models\Menu;
use App\Models\Product;
use App\Models\ProductCharacteristic;
use App\Models\SectionCollections;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class   CatalogPageService {

    const PAGINATION_SIZE = 12;

    public function getAvailableFilters($products): Collection
    {
        $filtersArray = collect();
        $productsCharacteristics = $products->pluck('characteristics')->unique();
        $filtersList = array_keys($productsCharacteristics->first()->toArray());

        foreach($filtersList as $filter) {
            $filterDb = Filter::query()->where('type', $filter)
                ->whereNotIn('type', ['nomenclature_group', 'stamp', 'color_code'])
                ->when($products->pluck('characteristics.brand')->unique()->contains('La Perla'), fn($q) => $q->where('type', '!=', 'metal_color'))
                ->first();

            if($filterDb) {
                if($filter == 'metal_color' || $filter == 'color') {
                    $type = 'color';
                }else {
                    $type = 'list';
                }

                $data = $productsCharacteristics->pluck($filterDb->type)->unique()->sort();
                $filtersArray->put($filterDb->type, [
                    'name' => $filterDb->name,
                    'slug' => $filterDb->type,
                    'type' => $type,
                    'data' => $data->toArray()
                ]);
            }
        }

        $productsCurrencied = $products->map(function($item) {
            return CartService::formatCurrency($item->price, true, $item->currency_id);
        });

        $filtersArray->put('price', [
            'name' => 'Цена',
            'type' => 'price',
            'data' => [
                'min' => $productsCurrencied->min(),
                'max' => $productsCurrencied->max()
            ]
        ]);

        return $filtersArray;
    }

    public function get ($sex, $category, Request $request) : Collection
    {
        $collection = collect();

        $slug = $category;

        $urlFilters = $request->except('search', 'utm_source', 'utm_medium', 'utm_campaign', 'gclid', 'fbclid');

        $breadcrumbs = [
            'Главная' => url('/'),
        ];

        switch($sex) {
            case 'female':
                $sexStr = 'Женский';
                break;
            case 'male':
                $sexStr = 'Мужской';
                break;
            case 'kids':
                $sexStr = 'Дети';
                break;
            default:
                $sexStr = 'Женский';
        }

        // general category selection
        $cat = Category::where('slug', $category)->first();
        $menu = Menu::where('slug', $category)->first();
        $brand = BrandDescription::where('name', $category)->first();
        $newCollections = ProductCharacteristic::where('collection', $category)->first();
        $search = $request->input('search');

        $seo = [];

        if($cat) {
            $breadcrumbs[$cat->name] = route('page.catalog', ['sex' => $sex, 'category' => $category]);
            $seo = $cat;

            $products = Product::query()
                ->with('characteristics')
                ->where('category_id', $cat->id)
                ->whereHas('characteristics', function($q) use ($sexStr) {
                    $q->where('sex', 'like', '%'.$sexStr.'%');
                })
                ->whereHas('images');
        }
        elseif($menu) {
            // specific category selection

            $breadcrumbs[$menu->category->parent()->name] = route('page.catalog', ['sex' => $sex, 'category' => $menu->category->parent()->slug]);
            $breadcrumbs[$menu->name] = route('page.catalog', ['sex' => $sex, 'category' => $category]);
            $seo = $menu;

            $products = Product::whereHas('characteristics', function($q) use ($menu, $sexStr) {
                $q->where('product_type_multiple', $menu->name)->where('sex', 'like', '%'.$sexStr.'%');
            })->whereHas('images')->with('characteristics');
        }
        elseif ($brand) {
            $breadcrumbs[$brand->name] = route('page.catalog', ['sex' => $sex, 'category' => $brand]);
            $seo = $brand;
            $slug = 'brands';

            $products = Product::whereHas('characteristics', function($q) use ($sexStr, $brand) {
                $q->where('sex', 'like', '%'.$sexStr.'%')->where('brand', 'like', '%'.$brand->name.'%');
            })->whereHas('images')->with('characteristics');
        }
        elseif ($newCollections) {
            $breadcrumbs[$newCollections->name] = route('page.catalog', ['sex' => $sex, 'collection' => $newCollections]);
            $slug = 'new-collections';

            $products = Product::whereHas('characteristics', function($q) use ($sexStr, $newCollections) {
                $q->where('sex', 'like', '%'.$sexStr.'%')->where('collection', 'like', '%'.$newCollections->name.'%');
            })->whereHas('images')->with('characteristics');
        }

        elseif ($search) {
            $products = Product::query()
                ->with('characteristics')
                ->whereHas('images')
                ->where('name', 'like', "%{$search}%")
                ->orWhere('vendor_code', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        }

        // if products exists - get filters
        if(isset($products) && $products->count() > 0) {
            $filters = $this->getAvailableFilters($products->get());
            $collection->put('filters', $filters);
        }

        if($urlFilters) {
            $currencySite = \Cookie::has('currency') ? \Cookie::get('currency') : 'kzt';
            $currencyDb = Currency::where('code', strtoupper($currencySite))->first();

            foreach($urlFilters as $key => $urlFilter) {
                $products->where(function ($q) use ($key, $urlFilter) {
                    if($key != 'page' && $key != 'price-min' && $key != 'price-max' && $key != 'color' && $key != 'sorting') {
                        foreach($urlFilter as $value) {
                            $q->orWhereHas('characteristics', function($q) use ($key, $value) {
                                $q->where($key, $value);
                            });
                        }
                    }

                    if($key == 'color') {
                        foreach($urlFilter as $value) {
                            $q->orWhereHas('characteristics', function($q) use ($key, $value) {
                                $q->where('metal_color', $value)
                                    ->orWhere('color', $value);
                            });
                        }
                    }
                });

                if($key == 'price-min' || $key == 'price-max') {
                    $priceMin = floatval(str_replace([$currencyDb->symbol, ' '], '', $urlFilters['price-min']));
                    $priceMax = floatval(str_replace([$currencyDb->symbol, ' '], '', $urlFilters['price-max']));

                    $productsCurrencied = $products->get()->map(function($item) {
                        return [
                            'id' => $item->id,
                            'price' => CartService::formatCurrency($item->price, true, $item->currency_id),
                        ];
                    })->whereBetween('price', [$priceMin, $priceMax]);
                    $products->whereIn('id', $productsCurrencied->pluck('id'));
                }

                if($key == 'sorting') {
                    if($urlFilter === 'price-down') {
                        $products->orderByRaw('price * '.$currencyDb->value.' DESC');
                    }elseif ($urlFilter === 'price-up') {
                        $products->orderByRaw('price * '.$currencyDb->value.' ASC');
                    }elseif ($urlFilter === 'new') {
                        $products->orderBy('created_at', 'desc');
                    }elseif ($urlFilter === 'popular') {
                        $products->orderBy('views', 'desc');
                    }
                }
            }
        } else {
            $products->orderBy('created_at', 'desc');
        }

        $products = $products
            ->whereHas('images')
            ->when(
                $category == 'Damiani' || (isset($urlFilters['brand']) && $urlFilters['brand'] == 'Damiani'),
                fn($q) => $q->groupBy('parent_vendor_code'),
                    fn($q) => $q->groupBy('vendor_code')
            )
            ->paginate(self::PAGINATION_SIZE);

        $bestProducts = $this->bestProducts($slug);


        $sectionСollections = SectionCollections::query()
            ->with('blocks')
            ->when(
                $cat && $cat->parent,
                fn($q) => $q->where('category_id', $cat->id)
            )
            ->latest()
            ->first();

        $collection->put('newCollection', []);
        $collection->put('choice', $bestProducts);
        $collection->put('category', $category);
        $collection->put('products', $products);
        $collection->put('sectionСollections', $sectionСollections);
        $collection->put('breadcrumbs', $breadcrumbs);
        $collection->put('seo', $seo);
        $collection->put('brand', $brand);

        return $collection;
    }

    public function getProduct ($slug) : Collection
    {
        $collection = collect();

        $product = Product::with('images', 'characteristics')->where('slug', $slug)->firstOrFail();

        $sex = $product->category->type->slug;

        $breadcrumbs = [
            'Главная' => url('/'),
            $product->category->name => route('page.catalog', ['sex' => $sex, 'category' => $product->category->slug]),
            $product->menu->name => route('page.catalog', ['sex' => $sex, 'category' => $product->menu->slug]),
        ];

        if($product->getCharacteristic('collection')) {
            $breadcrumbs[$product->getCharacteristic('collection')] = route('page.catalog', ['sex' => $sex, 'category' => $product->menu->slug, 'collection' => [$product->getCharacteristic('collection')]]);
        }

        $breadcrumbs[$product->displayName()] = '#';

        $similarProducts = Product::whereNotNull('parent_vendor_code')
            ->where('parent_vendor_code', $product->parent_vendor_code)
            ->orWhere('id', $product->id)
            ->whereHas('images')
            ->get();

        $zhannaChoice = collect();

//        foreach($zhannaProducts as $p) {
//            $zhannaChoice->push([
//                'id' => $p->id,
//                'image' => $p->poster(),
//                'category' => $p->category->name,
//                'title' => $p->displayName(),
//                'price' => $p->price,
//                'url' => route('page.product', $p->slug)
//            ]);
//        }

        switch($sex) {
            case 'female':
                $sexStr = 'Женский';
                break;
            case 'male':
                $sexStr = 'Мужской';
                break;
            case 'kids':
                $sexStr = 'Дети';
                break;
            default:
                $sexStr = 'Женский';
        }

        $fitProducts = Product::where('id', '!=', $product->id)
            ->where('menu_id', $product->menu_id)
            ->whereHas('images')
            ->whereHas('characteristics', function($q) use ($sexStr) {
                $q->where('sex', 'like', '%'.$sexStr.'%');
            })
            ->inRandomOrder()
            ->take(5)
            ->get();

        $alsoLike = Product::where('id', '!=', $product->id)
            ->whereNotIn('id', $fitProducts->pluck('id')->toArray())
            ->where('menu_id', $product->menu_id)
            ->whereHas('images')
            ->whereHas('characteristics', function($q) use ($sexStr) {
                $q->where('sex', 'like', '%'.$sexStr.'%');
            })
            ->inRandomOrder()
            ->take(5)
            ->get();

        $parentedProducts = Product::with('images', 'characteristics')
            ->when(
                $product->brand == 'Damiani',
                fn($q) => $q->where('parent_vendor_code', $product->parent_vendor_code)->whereHas('characteristics', fn($q) => $q->where('brand', 'Damiani')),
                fn($q) => $q->where('vendor_code', $product->vendor_code)
            )
            ->get();

        $attributes = $this->groupingСharacteristics($parentedProducts);
        $images = $parentedProducts->map(function ($product) {
            if($product->images->count()) $product->images->map(function ($image) use ($product) {
                $image['color'] = $product->getCharacteristic('color') ?? $product->getCharacteristic('metal_color') ?? 'one color';
                return $image;
            });
            return $product;
        })->pluck('images')->sortByDesc('is_main')->flatten();

        $collection->put('zhannaChoice', $zhannaChoice->toArray());
        $collection->put('product', $product);
        $collection->put('fit', $fitProducts);
        $collection->put('also', $alsoLike);
        $collection->put('breadcrumbs', $breadcrumbs);
        $collection->put('similarProducts', $similarProducts);
        $collection->put('attributes', $attributes);
        $collection->put('images', $images);

        return $collection;
    }

    public function groupingСharacteristics($parentedProducts)
    {
        $attributesArr = [];

        foreach($parentedProducts as $prod) {
            $color = $prod->getCharacteristic('color')
                ?? $prod->getCharacteristic('metal_color')
                ?? 'one color';
            $size = $prod->getCharacteristic('size') ?? 'one size';

            $attributesArr['colors'] [$color]= $prod->id;
            $attributesArr['sizes'] [$size]= $prod->id;
        }

        return collect($attributesArr)->recursive();
    }

    public function     updateAttributes($product, $type, $value)
    {
        $collection = collect();
        $attributesArr = [];
        $parentedProducts = Product::query()
            ->when(
                $product->brand == 'Damiani',
                fn($q) => $q->where('parent_vendor_code', $product->parent_vendor_code)->whereHas('characteristics', fn($q) => $q->where('brand', 'Damiani')),
                fn($q) => $q->where('vendor_code', $product->vendor_code)
            )
            ->get();

        foreach($parentedProducts as $prod) {
            $color = $prod->getCharacteristic('color')
                ?? $prod->getCharacteristic('metal_color')
                ?? 'one color';
            $size = $prod->getCharacteristic('size') ?? 'one size';

            if($type == 'color' && $color == $value) {
                $attributesArr['colors'] [$color]= $prod->id;
                $attributesArr['sizes'] [$size]= $prod->id;
            }
            if($type == 'size' && $size == $value) {
                $attributesArr['colors'] [$color]= $prod->id;
                $attributesArr['sizes'] [$size]= $prod->id;
            }
        }

        $attributes = collect($attributesArr)->recursive();

        $collection->put('attributes', $attributes);

        return $collection;
    }

    public function bestProducts($slug = '')
    {
        $brand = 'Damiani';
        if($slug === 'brands'
            | $slug === 'new-collections'
            | request()->route()->getName() === 'page.zhannas_choice'
            | Category::query()->where('slug', $slug)->whereIn('id', [1, 11, 14, 4, 5])->exists()
            | Menu::query()->where('slug', $slug)->whereIn('category_id', [1, 11, 14, 4, 5])->exists()) {
            $brand = 'Damiani';
        }
        if(request()->route()->getName() === 'page.youth_products'
            | Category::where('slug', $slug)->whereIn('id', [2, 6, 7, 8])->exists()
            | Menu::where('slug', $slug)->whereIn('category_id', [2, 6, 7, 8])->exists()) {
            $brand = 'Zardozi';
        }
        if(Category::where('slug', $slug)->whereIn('id', [9])->first()
            | Menu::where('slug', $slug)->whereIn('category_id', [9])->exists()) {
            $brand = 'La Perla';
        }

        $products = Product::query()
            ->with(['images', 'currency', 'characteristics', 'category', 'menu'])
            ->whereHas('images')
            ->whereHas('characteristics', fn($q) => $q->where('brand', $brand))
            ->latest('views')
            ->take(4)
            ->get();


        return [
            'brand' => $brand,
            'products' => $products->map(fn($item) => [
                'id' => $item->id,
                'image' => $item->poster(),
                'category' => $item->category->name ?? $item->menu->name,
                'title' => $item->displayName(),
                'price' => $item->price,
                'currency' => $item->currency,
                'url' => route('page.product', $item->slug),
            ])->toArray()
        ];
    }
}

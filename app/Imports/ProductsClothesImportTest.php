<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Filter;
use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsClothesImportTest implements ToCollection,  WithHeadingRow
{
    public function headingRow(): int
    {
        return 1;
    }

    public function collection(Collection $collection)
    {
        foreach($collection as $item) {
            $category = Category::where('name', $item['tipatovara'])->first();

            if($category) {
                $product = Product::create([
                    'name' => $item['marketing_name'],
                    'price' => 0,
                    'vendor_code' => $item['artikul'],
                    'code' => $item['kod'],
                    'description' => $item['naimenovanie'],
                    'category_id' => $category->id
                ]);

                File::deleteDirectory(public_path('i/products/'.$product->id));

                if($item['tipatovara']) {
                    $product->filterBlock()->create([
                        'filter_id' => Filter::where('type', 'product_type')->first()->id,
                        'value' => $item['tipatovara'],
                        'slug' => Str::slug($item['tipatovara'])
                    ]);
                }

                if($item['marka']) {
                    $product->filterBlock()->create([
                        'filter_id' => Filter::where('type', 'stamp')->first()->id,
                        'value' => $item['marka'],
                        'slug' => Str::slug($item['marka'])
                    ]);
                }

                if($item['kollekciya']) {
                    $product->filterBlock()->create([
                        'filter_id' => Filter::where('type', 'collection')->first()->id,
                        'value' => $item['kollekciya'],
                        'slug' => Str::slug($item['kollekciya'])
                    ]);
                }

                if($item['material']) {
                    $product->filterBlock()->create([
                        'filter_id' => Filter::where('type', 'metal_material')->first()->id,
                        'value' => $item['material'],
                        'slug' => Str::slug($item['material'])
                    ]);
                }

                if($item['razmer']) {
                    $product->filterBlock()->create([
                        'filter_id' => Filter::where('type', 'size')->first()->id,
                        'value' => $item['razmer'],
                        'slug' => Str::slug($item['razmer'])
                    ]);
                }

                if($item['strana_proizvodstva']) {
                    $product->filterBlock()->create([
                        'filter_id' => Filter::where('type', 'country_provider')->first()->id,
                        'value' => $item['strana_proizvodstva'],
                        'slug' => Str::slug($item['strana_proizvodstva'])
                    ]);
                }

                if($item['sezon']) {
                    $product->filterBlock()->create([
                        'filter_id' => Filter::where('type', 'cloth_season')->first()->id,
                        'value' => $item['sezon'],
                        'slug' => Str::slug($item['sezon'])
                    ]);
                }

                if($item['pol']) {
                    $product->filterBlock()->create([
                        'filter_id' => Filter::where('type', 'sex')->first()->id,
                        'value' => $item['pol'],
                        'slug' => Str::slug($item['pol'])
                    ]);
                }

                if($item['roditel']) {
                    $product->filterBlock()->create([
                        'filter_id' => Filter::where('type', 'brand')->first()->id,
                        'value' => $item['roditel'],
                        'slug' => Str::slug($item['roditel'])
                    ]);
                }

                $name = str_replace('/', '_', $item['item_id']);

                if(
                    File::exists(public_path('imports/clothes/'.$name.'_1.jpg')) ||
                    File::exists(public_path('imports/clothes/'.$name.'_2.jpg')) ||
                    File::exists(public_path('imports/clothes/'.$name.'_3.jpg')) ||
                    File::exists(public_path('imports/clothes/'.$name.'_100.jpg'))
                ) {
                    try {
                        File::makeDirectory(public_path('i/products/'. $product->id), 0777, true, true);

                        File::copy(
                            public_path('imports/clothes/'.$name.'_1.jpg'),
                            public_path('i/products/'.$product->id.'/'.$name.'_1.jpg')
                        );

                        File::copy(
                            public_path('imports/clothes/'.$name.'_2.jpg'),
                            public_path('i/products/'.$product->id.'/'.$name.'_2.jpg')
                        );

                        File::copy(
                            public_path('imports/clothes/'.$name.'_100.jpg'),
                            public_path('i/products/'.$product->id.'/'.$name.'_100.jpg')
                        );

                        $product->images()->create([
                            'name' => $name.'_1.jpg',
                            'is_main' => 1
                        ]);

                        $product->images()->create([
                            'name' => $name.'_2.jpg',
                            'is_main' => 0
                        ]);

                        $product->images()->create([
                            'name' => $name.'_3.jpg',
                            'is_main' => 0
                        ]);

                        $product->images()->create([
                            'name' => $name.'_100.jpg',
                            'is_main' => 0
                        ]);

                    }catch (\Exception $exception) {
                        info($exception->getMessage());
                    }
                }
            }
        }
    }
}

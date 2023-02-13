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

class ProductsImportTest implements ToCollection, WithHeadingRow
{

    public function headingRow(): int
    {
        return 1;
    }

    public function collection(Collection $collection)
    {
        foreach($collection as $item)
        {
            $category = Category::where('name', $item['kategoriya'])->first();

            $subcategories = [
                'Necklace' => Category::where('slug', 'kole')->first()->id,
                'Brooch' => Category::where('slug', 'broshi')->first()->id,
                'Earrings' => Category::where('slug', 'sergi')->first()->id,
                'Hand bracelet' => Category::where('slug', 'braslety')->first()->id,
                'Ring' => Category::where('slug', 'kolca')->first()->id,
                'Mono earrings' => Category::where('slug', 'sergi')->first()->id,
                'Bracelet' => Category::where('slug', 'braslety')->first()->id
            ];

            if($category){
                $product = Product::create([
                    'name' => $item['naimenovanie'],
                    'price' => $item['cena'],
                    'vendor_code' => $item['artikul'],
                    'code' => $item['kod'],
                    'description' => $item['marketingovoe_opisanie_dlya_saita'],
                    'category_id' => $subcategories[$item['tipatovara']]
                ]);

                File::deleteDirectory(public_path('i/products/'.$product->id));

                if($item['cvetmetala']) {
                    $product->filterBlock()->create([
                        'filter_id' => Filter::where('type', 'metal_color')->first()->id,
                        'value' => Str::snake($item['cvetmetala']),
                        'slug' => Str::slug($item['cvetmetala'])
                    ]);
                }

                if($item['tipatovara']) {
                    $product->filterBlock()->create([
                        'filter_id' => Filter::where('type', 'product_type')->first()->id,
                        'value' => $item['tipatovara'],
                        'slug' => Str::slug($item['tipatovara'])
                    ]);
                }

                if($item['brend']) {
                    $product->filterBlock()->create([
                        'filter_id' => Filter::where('type', 'brand')->first()->id,
                        'value' => $item['brend'],
                        'slug' => Str::slug($item['brend'])
                    ]);
                }

                if($item['karatnost']) {
                    $product->filterBlock()->create([
                        'filter_id' => Filter::where('type', 'carat')->first()->id,
                        'value' => $item['karatnost'],
                        'slug' => Str::slug($item['karatnost'])
                    ]);
                }

                if($item['nomenklaturnayagruppa']) {
                    $product->filterBlock()->create([
                        'filter_id' => Filter::where('type', 'nomenclature_group')->first()->id,
                        'value' => $item['nomenklaturnayagruppa'],
                        'slug' => Str::slug($item['nomenklaturnayagruppa'])
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

                if($item['vid_kamnya']) {
                    $product->filterBlock()->create([
                        'filter_id' => Filter::where('type', 'stone_type')->first()->id,
                        'value' => $item['vid_kamnya'],
                        'slug' => Str::slug($item['vid_kamnya'])
                    ]);
                }

                if($item['razmer']) {
                    $product->filterBlock()->create([
                        'filter_id' => Filter::where('type', 'size')->first()->id,
                        'value' => $item['razmer'],
                        'slug' => Str::slug($item['razmer'])
                    ]);
                }

                $name = str_replace('/', '_', $item['artikul']);

                if(File::exists(public_path('imports/jewerly/'.$name.'.jpg'))) {
                    $img = $name.'.jpg';

                    $product->images()->create([
                        'name' => $img,
                        'is_main' => 1
                    ]);

                    try {
                        File::makeDirectory(public_path('i/products/'. $product->id), 0777, true, true);
                        File::copy(public_path('imports/jewerly/'.$name.'.jpg'), public_path('i/products/'.$product->id.'/'.$name.'.jpg'));
                    }catch (\Exception $exception) {
                        info($exception->getMessage());
                    }

                }
            }

        }
    }
}

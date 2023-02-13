<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImagesImport implements ToCollection, WithHeadingRow
{
    public function headingRow(): int
    {
        return 1;
    }

    public function collection(Collection $collection)
    {
        foreach($collection as $item) {
            if(!empty($item['images'])) {
                $allImages = explode(';', $item['images']);

                foreach($allImages as $k => $img) {
                    $imageName = explode('.', $img);
                    $product = Product::where('vendor_slug', $imageName)->first();

                    if(!empty($product)) {
                        $product->images()->create([
                            'name' => $imageName[0].'.'.$imageName[1],
                            'is_main' => true,
                        ]);
                        $product->images()->create([
                            'name' => $imageName[0].'-'.++$k.'.'.$imageName[1],
                            'is_main' => false,
                        ]);
                    }

                    echo $imageName[0] . ' - added image <br>';
                }
            }
        }
    }
}

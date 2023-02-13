<?php

namespace Database\Seeders;

use App\Imports\ProductsClothesImportTest;
use App\Imports\ProductsImportTest;
use App\Models\Filter;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->truncate();
        DB::table('product_images')->truncate();

        $file = public_path('imports/jewerly-2.xlsx');
        Excel::import(new ProductsImportTest, $file);

        $clothes = public_path('imports/clothes.xlsx');
        Excel::import(new ProductsClothesImportTest, $clothes);
    }
}

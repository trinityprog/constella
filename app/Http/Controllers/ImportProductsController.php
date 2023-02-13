<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImportTest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportProductsController extends Controller
{
    public function store ()
    {
        $file = public_path('imports/jewerly.xlsx');
        Excel::import(new ProductsImportTest, $file);
    }
}

<?php

namespace App\Imports;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToArray;

class GeomaPricesImport implements ToArray
{
    public function array($array)
    {
        $prices = [];

        foreach($array as $item) {
            $prices []= [
                'price' => $item[1],
                'image' => '/assets/' . $item[0]
            ];
        }

        $json = json_encode($prices);
        dd($json);
//        https://www.convertsimple.com/convert-json-to-javascript/
    }
}

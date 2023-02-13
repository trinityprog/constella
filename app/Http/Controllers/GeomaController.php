<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\ImagesImportStoreExcelRequest;
use App\Imports\ImagesImport;
use App\Models\Geoma;
use App\Services\Bitrix24Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class GeomaController extends Controller
{
    public function index ()
    {
        return view('geoma.index');
    }

    public function store (Request $request, Bitrix24Service $bitrix24Service)
    {
        $data = $request->all();
        $geomaOrder = json_decode($data['json'], TRUE);

        $geoma = Geoma::create([
            'city' => $geomaOrder['city'],
            'email' => $geomaOrder['email'],
            'name' => $geomaOrder['name'],
            'phone' => $geomaOrder['phone'],
            'surname' => $geomaOrder['surname'],
            'connection' => $geomaOrder['connection'],
            'figures' => json_encode($geomaOrder['figures']),
            'price' => $geomaOrder['price']
        ]);

        $bitrix24Service->handleGeomaOrder($geomaOrder);

        return $geoma;
    }
}

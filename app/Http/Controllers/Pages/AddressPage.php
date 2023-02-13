<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\AddressCity;

class AddressPage extends Controller
{
    public function index()
    {
        $cities = AddressCity::with('addresses')->get();
        $data = collect([
            'country' => [
                'x' => 48.183333,
                'y' => 66.366667
            ],
            'zoom' => [
                'country' => 5,
                'city' => 12,
                'address' => 16,
            ],
            'cities' => $cities,
            'addresses' => $cities
                ->pluck('addresses')
                ->flatten()
                ->map(fn ($address) => array_merge(
                    $address->toArray(), [
                        'logos' => $address->brands ? $address->brandsModels->filter(fn($b) => $b->logo != null)->pluck('logoPath') : []
                    ]
                ))
        ]);

        return view('pages.about.contacts', compact('data'));
    }
}

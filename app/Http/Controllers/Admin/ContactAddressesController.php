<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\AddressCity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactAddressesController extends Controller
{
    public function index(Request $request)
    {
        $request->validate(['city_id' => 'required|exists:addresses,id']);

        $city = AddressCity::query()
            ->with('addresses')
            ->findOrFail($request->city_id);

        return view('admin.contact-addresses.index', compact('city'));
    }

    public function create(Request $request)
    {
        $request->validate(['city_id' => 'required|exists:address_cities,id']);

        $city = Address::query()->findOrFail($request->city_id);

        return view('admin.contact-addresses.create', compact('city'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'en' => 'required|string|min:3',
                'kz' => 'required|string|min:3',
                'ru' => 'required|string|min:3',
            ],
            'info' => [
                'en' => 'required|string|min:5',
                'kz' => 'required|string|min:5',
                'ru' => 'required|string|min:5',
            ],
            'brands' => [],
            'phones' => [],
            'coordinates' => [
                'x' => 'string',
                'y' => 'string',
            ],
            'city_id' => 'required|exists:address_cities,id',
        ]);

        $address = Address::query()->findOrFail($request->city_id);

        Address::create([
            'name' => [
                'en' => $request->input('name_en'),
                'kz' => $request->input('name_kz'),
                'ru' => $request->input('name_ru'),
            ],
            'info' => [
                'en' => $request->input('info_en'),
                'kz' => $request->input('info_kz'),
                'ru' => $request->input('info_ru'),
            ],
            'coordinates' => [
                'x' => $request->input('coordinates_x'),
                'y' => $request->input('coordinates_y'),
            ],
            'brands' => $request->input('brands'),
            'phones'=> $request->input('phones'),
            'city_id' => $request->input('city_id'),
        ]);

        return redirect()->route('admin.contact-addresses.index', ['city_id' => $address->id])->with('flash_message', 'Адрес добавлен!');
    }

    public function edit(Request $request, $id)
    {
        $address = Address::query()->findOrFail($id);

        $city = Address::query()->findOrFail($request->city_id);

        return view('admin.contact-addresses.edit', compact('address', 'city'));
    }

    public function update(Request $request, $id)
    {
        $address = Address::query()->findOrFail($id);

        $request->validate([
            'name' => [
                'en' => 'required|string|min:3',
                'kz' => 'required|string|min:3',
                'ru' => 'required|string|min:3',
            ],
            'info' => [
                'en' => 'required|string|min:5',
                'kz' => 'required|string|min:5',
                'ru' => 'required|string|min:5',
            ],
            'brands' => [],
            'phones' => [],
            'coordinates' => [
                'x' => 'string',
                'y' => 'string',
            ],
            'city_id' => 'required|exists:address_cities,id',
        ]);

        $address->update([
            'name' => [
                'en' => $request->input('name_en'),
                'kz' => $request->input('name_kz'),
                'ru' => $request->input('name_ru'),
            ],
            'info' => [
                'en' => $request->input('info_en'),
                'kz' => $request->input('info_kz'),
                'ru' => $request->input('info_ru'),
            ],
            'coordinates' => [
                'x' => $request->input('coordinates_x'),
                'y' => $request->input('coordinates_y'),
            ],
            'brands' => $request->input('brands'),
            'phones'=>  $request->input('phones'),
            'city_id' => $request->input('city_id'),
        ]);

        return redirect()->route('admin.contacts.index')->with('flash_message', 'Адрес изменен!');
    }
function destroy($id)
    {
        $address = Address::query()->findOrFail($id);
        $address->delete();

        return back()->with('flash_message', 'Адрес удален!');
    }
}

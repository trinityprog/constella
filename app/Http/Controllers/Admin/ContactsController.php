<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AddressCity;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
        $cities = AddressCity::with('addresses')->get();

        return view('admin.contacts.index', compact('cities'));
    }

    public function create()
    {
        return view('admin.contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'en' => 'required|string',
                'kz' => 'required|string',
                'ru' => 'required|string',
            ],
            'coordinates' => [
                'x' => 'required|string',
                'y' => 'required|string',
            ]
        ]);


        AddressCity::create([
            'name' => [
                'en' => $request->input('name_en'),
                'kz' => $request->input('name_kz'),
                'ru' => $request->input('name_ru'),
            ],
            'coordinates' => [
                'x' => $request->input('coordinates_x'),
                'y' => $request->input('coordinates_y'),
            ]
        ]);

        return redirect()->route('admin.contacts.index')->with('flash_message', 'Город добавлен!');
    }

    public function edit($id)
    {
        $city = AddressCity::query()->findOrFail($id);

        return view('admin.contacts.edit', compact('city'));
    }

    public function update(Request $request, $id)
    {
        $city = AddressCity::query()->findOrFail($id);

        $request->validate([
            'name' => [
                'en' => 'required|string',
                'kz' => 'required|string',
                'ru' => 'required|string',
            ],
            'coordinates' => [
                'x' => 'required|string',
                'y' => 'required|string',
            ]
        ]);

        $city->update([
            'name' => [
                'en' =>$request->input('name_en'),
                'kz' =>$request->input('name_kz'),
                'ru' => $request->input('name_ru'),
            ],
            'coordinates' => [
                'x' => $request->input('coordinates_x'),
                'y' =>$request->input('coordinates_y'),
            ]
        ]);

        return redirect()->route('admin.contacts.index')->with('flash_message', 'Город изменен!');
    }

    public function destroy($id)
    {
        $city = AddressCity::query()->findOrFail($id);
        $city->delete();
        return back()->with('flash_message', 'Город удален!');
    }
}

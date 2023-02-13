<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddAddressRequest;
use App\Models\UserAddress;
use Illuminate\Http\Request;

class ProfileAddressesPage extends Controller
{
    public function create ()
    {
        return view('pages.user.address');
    }

    public function edit ($id)
    {
        $address = UserAddress::find($id);

        return view('pages.user.address_edit', compact('address'));
    }

    public function store (AddAddressRequest $request)
    {
        $data = $request->validated();

        auth()->user()->addresses()->create($data);

        return redirect()->route('user.profile.details');
    }

    public function update (AddAddressRequest $request, $id)
    {
        $data = $request->validated();

        $address = UserAddress::find($id);

        $address->update($data);

        return redirect()->route('user.profile.details');
    }
}

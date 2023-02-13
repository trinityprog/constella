<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserAddress;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index(Request $request)
    {
        $addresses = UserAddress::query()
            ->with('user')
            ->when(
                $request->has('user_id') && $request->filled('user_id'),
                fn($q) => $q->whereHas('user', fn($q) => $q->where('id', $request->user_id))
            )
            ->paginate(15);

        return view('admin.addresses.index', compact('addresses'));
    }

    public function show($id)
    {
        $address = UserAddress::findOrFail($id);
        return view('admin.addresses.show', compact('address'));
    }
}

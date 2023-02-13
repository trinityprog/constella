<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserAddress;
use Illuminate\Http\Request;

class ProfileApiController extends Controller
{
    public function deleteAddress (Request $request)
    {
        $addressId = $request->input('addressId');

        $status = UserAddress::find($addressId)->delete();

        return response()->json([
            'status' => $status,
            'url' => route('user.profile.details'),
            'location' => $request->input('location')
        ]);
    }
}

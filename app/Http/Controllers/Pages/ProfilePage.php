<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddAddressRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\UserAddress;
use App\Models\UserInfo;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProfilePage extends Controller
{
    public function index ()
    {
        $favorites = auth()->user()->favorites()->orderByDesc('created_at');
        return view('pages.user.profile', compact('favorites'));
    }

    public function show ()
    {
        $info = auth()->user()->info;

        return view('pages.user.details', compact('info'));
    }

    public function edit ()
    {
        $info = auth()->user()->info;

        return view('pages.user.profile_edit', compact('info'));
    }

    public function update (UpdateProfileRequest $request): RedirectResponse
    {
        $data = $request->validated();

        auth()->user()->update([
            'name' => $data['name'],
            'sex' => $data['sex']
        ]);

        $data['dob'] = str_replace('/', '.', $data['dob']);

        $dob = Carbon::parse($data['dob'])->format('Y-m-d');

        UserInfo::updateOrCreate(
            ['user_id' => auth()->user()->id],
            ['surname' => $data['surname'], 'phone' => $data['phone'], 'dob' => $dob, 'iin' => $data['iin']]
        );

        return redirect()->route('user.profile.details');
    }
}

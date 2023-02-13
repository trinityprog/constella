<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilePasswordPage extends Controller
{
    public function edit ()
    {
        return view('pages.user.password_edit');
    }

    public function update (PasswordUpdateRequest $request)
    {
        $data = $request->validated();

        if(!Hash::check($data['current_password'], auth()->user()->password))
            return back()->withErrors(['current_password' => 'Неверный пароль']);

        auth()->user()->update([
            'password' => bcrypt($data['new_password'])
        ]);

        return redirect()->route('user.profile.details');
    }
}

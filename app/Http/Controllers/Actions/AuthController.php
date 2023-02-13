<?php

namespace App\Http\Controllers\Actions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\GuestLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login (LoginRequest $request)
    {
        $data = $request->validated();

        if(auth()->attempt(['email' => $data['log_email'], 'password' => $data['log_password']], isset($data['remember'])))
            return redirect()->route('user.profile');

        return redirect()->route('page.index');
    }

    public function login_guest (GuestLoginRequest $request)
    {
        $data = $request->validated();

        return redirect()->route('order.main')->withCookie(cookie()->forever('guest_email', $data['g_email']));
    }

    public function register (RegisterRequest $request)
    {
        $data = $request->validated();

        $user = User::create([
            'name' => $data['reg_name'],
            'email' => $data['reg_email'],
            'password' => bcrypt($data['reg_password']),
            'sex' => $data['reg_sex']
        ]);

        auth()->login($user);

        return redirect()->route('user.profile');
    }

    public function logout ()
    {
        auth()->logout();
        session()->flush();

        return redirect()->route('page.index');
    }
}

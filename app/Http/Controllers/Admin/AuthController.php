<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login ()
    {
        return view('adminlte::auth.login');
    }

    public function login_action (Request $request)
    {
        $data = $request->all();

        $user = auth()->attempt(['email' => $data['email'], 'password' => $data['password']]);

        if(!$user) {
            return back()->withErrors(['email' => 'Неверные доступы']);
        }

        return redirect('/admin/products');
    }
}

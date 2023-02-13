<?php

namespace App\Http\Controllers\Actions;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index ($lg = 'ru'): RedirectResponse
    {
        app()->setLocale($lg);
        cookie()->queue(cookie()->make('language', $lg, time() + (10 * 365 * 24 * 60 * 60)));
        return redirect()->back();
    }
}

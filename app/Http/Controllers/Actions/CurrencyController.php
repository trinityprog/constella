<?php

namespace App\Http\Controllers\Actions;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CurrencyController extends Controller
{
    public function index ($currency = 'kzt') : RedirectResponse
    {
        cookie()->queue(cookie()->make('currency', $currency, time() + (10 * 365 * 24 * 60 * 60)));
        return redirect()->back();
    }
}

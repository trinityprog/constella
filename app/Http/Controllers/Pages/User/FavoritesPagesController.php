<?php

namespace App\Http\Controllers\Pages\User;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Product;
use Illuminate\Http\Request;

class FavoritesPagesController extends Controller
{
    public function index ()
    {
        $currencySite = \Cookie::has('currency') ? \Cookie::get('currency') : 'kzt';
        $currencyDb = Currency::where('code', strtoupper($currencySite))->first();

        $favorites = Product::query()
            ->whereHas('favorite', fn($q) => $q->where('user_id', auth()->id()))
            ->when(request()->has('sorting') && request('sorting') == 'price-down', fn($q) => $q->orderByRaw('price * '.$currencyDb->value.' DESC'))
            ->when(request()->has('sorting') && request('sorting') == 'price-up', fn($q) => $q->orderByRaw('price * '.$currencyDb->value.' ASC'))
            ->when(request()->has('sorting') && request('sorting') == 'new', fn($q) => $q->orderBy('created_at', 'desc'))
            ->when(request()->has('sorting') && request('sorting') == 'jewelry', fn($q) => $q->where('category_id', '1'))
            ->when(request()->has('sorting') && request('sorting') == 'clothing', fn($q) => $q->where('category_id', '3'))
            ->when(request()->has('sorting') && request('sorting') == 'underwear', fn($q) => $q->where('category_id', '9'))
            ->when(request()->has('sorting') && request('sorting') == 'for-home', fn($q) => $q->where('category_id', '6'))
            ->paginate(12);

        return view('pages.user.favorites', compact('favorites'));
    }

    public function remove ($id)
    {
        auth()->user()->favorites()
            ->where('product_id', $id)
            ->firstOrFail()
            ->delete();

        return ['status' => 'success'];
    }

    public function refund_request_page()
    {
        return view('mobile.refund_request');
    }
}

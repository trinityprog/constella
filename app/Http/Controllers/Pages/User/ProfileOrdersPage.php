<?php

namespace App\Http\Controllers\Pages\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\PackPromocode;
use App\Models\Promocode;
use Illuminate\Http\Request;

class ProfileOrdersPage extends Controller
{
    public function index ()
    {
        $orders = auth()->user()->orders;
        return view('pages.user.orders.index', compact('orders'));
    }

    public function show ($id)
    {
        $order = Order::with('products', 'promocode')->where('id', $id)->first();

        if ($order->promocode == null){
            $promocode = '';
        } else {
            $promocode = $order->promocode->pack->discount;
        }

        return view('pages.user.orders.show', compact('order', 'promocode'));
    }
}

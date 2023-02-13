<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddToCartRequest;
use App\Models\Order;
use App\Models\OrderProducts;
use App\Services\CartService;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartApiController extends Controller
{
    public $service;

    public function __construct()
    {
        $this->service = new CartService();
    }

    public function add (AddToCartRequest $request): JsonResponse
    {
        $data = $request->validated();

        $result = $this->service->add(
            $data['product'],
            $data['amount'],
            [
                'size' => $data['size'],
                'color' => $data['color'],
                'currency' => strtoupper(Cookie::get('currency'))
            ]
        );

        return response()->json($result);
    }

    public function update (Request $request): array
    {
        $data = $request->all();

        return $this->service->update($data['product'], $data['qty']);
    }

    public function update_order (Request $request): array
    {
        $data = $request->all();
        $order = Order::find($data['order']);
        $orderProducts = OrderProducts::where('order_id', $data['order'])->where('product_id', $data['product'])->first();
        $orderProducts->update(['count' => $data['qty']]);

        return [
            'total' => CartService::formatTotal($order->getFullSumm()),
            'count' => $order->products()->sum('count'),
            'currenctCount' => $orderProducts->count,
        ];
    }

    public function remove_order (Request $request): array
    {
        $data = $request->all();
        $order = Order::find($data['order']);
        $orderProducts = OrderProducts::where('order_id', $data['order'])->where('product_id', $data['product'])->first();
        $orderProducts->delete();

        if($order->products()->count() == 0) {
            $order->delete();
            return [
                'last' => 'last'
            ];
        }else {
            return [
                'total' => CartService::formatTotal($order->getFullSumm()),
                'count' => $order->products()->sum('count'),
                'last' => 'not-last',
            ];
        }
    }

    public function remove (Request $request): array
    {
        $data = $request->all();

        return $this->service->remove($data['product']);
    }

    public function clear ()
    {
        return $this->service->clear();
    }

    public function notification()
    {
        $cart_count = Cart::count();
        $cart_content = Cart::content();
        $cart_total = CartService::getTotal();
        return view('partials.cart-notification', compact('cart_count', 'cart_content', 'cart_total'));
    }
}

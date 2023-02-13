<?php

namespace App\Http\Controllers\Actions;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\CDEKService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrdersStatusesController extends Controller
{
    public function success (Request $request, $id): RedirectResponse
    {
        $response = simplexml_load_string($request->input('xmlmsg'));
        $json = json_encode($response);
        $res = json_decode($json, TRUE);

        $orderId = 0;

        if(isset($res['Message'])) {
            $orderId = $res['Message']['OrderID'];
        }

        if(isset($res['OrderID'])) {
            $orderId = $res['OrderID'];
        }

        $order = Order::find($id);
        $order->update(['status' => 6]);
        $order->payment()->where('order_payment_id', $orderId)->update(['status' => 'Payed', 'res' => $json]);

        $orderAddress = $order->info;
            if($orderAddress->delivery_type === 'courier') {
            foreach($order->products as $product) {
                $leftover = $product->product->leftover;
                if($leftover) {
                    $cdek = CDEKService::create([
                        'city' => $leftover->warehouse_city,
                        'postal_code' => $leftover->warehouse_postal_code,
                        'address' => $leftover->warehouse_address
                    ], [
                        'city' => $orderAddress->address->city,
                        'postal_code' => $orderAddress->address->index,
                        'address' => $orderAddress->address->address
                    ], $product, $order);
                }
            }
        }


        return redirect()->route('user.profile.orders', ['status' => 'success', '#payment-success']);
    }

    public function cancel (Request $request, $id) {
        $response = simplexml_load_string($request->input('xmlmsg'));
        $json = json_encode($response);
        $res = json_decode($json, TRUE);

        $orderId = 0;

        if(array_key_exists('Message', $res)) {
            $orderId = $res['Message']['OrderID'];
        }

        if(isset($res['OrderID'])) {
            $orderId = $res['OrderID'];
        }

        $order = Order::find($id);
        $order->payment()->where('order_payment_id', $orderId)->update(['status' => 'Canceled', 'res' => $json, ]);


        return redirect()
            ->route('user.profile.orders', ['status' => 'error'])
            ->with(['message' => 'Заказ отменен', 'status' => 'Вы отменили оплату заказа. Ее всегда можно повторить на странице заказа!']);
    }

    public function error (Request $request, $id) {
        $response = simplexml_load_string($request->input('xmlmsg'));
        $json = json_encode($response);
        $res = json_decode($json, TRUE);

        $orderId = 0;

        if(isset($res['OrderID'])) {
            $orderId = $res['OrderID'];
        }

        $order = Order::find($id);
        $order->payment()->where('order_payment_id', $orderId)->update(['status' => 'Error', 'res' => $json]);

        return redirect()
            ->route('user.profile.orders', ['status' => 'error', '#payment-error'])
            ->with(['payment_message' => isset($res['OrderID']) ? $res['OrderStatusScr'] : 'Отказ в оплате', 'payment_status' => (isset($res['ResponseDescription'])) ? $res['ResponseDescription'] : 'Не удалось произвести оплату! Обратитесь в свой банк чтобы узнать подробности!']);
    }
}

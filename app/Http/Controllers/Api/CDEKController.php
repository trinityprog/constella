<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\UserAddress;
use App\Services\CartService;
use App\Services\CDEKService;
use Illuminate\Http\Request;

class CDEKController extends Controller
{
    public static function true_wordform($num, $form_for_1, $form_for_2, $form_for_5){
        $num = abs($num) % 100; // берем число по модулю и сбрасываем сотни (делим на 100, а остаток присваиваем переменной $num)
        $num_x = $num % 10; // сбрасываем десятки и записываем в новую переменную
        if ($num > 10 && $num < 20) // если число принадлежит отрезку [11;19]
            return $form_for_5;
        if ($num_x > 1 && $num_x < 5) // иначе если число оканчивается на 2,3,4
            return $form_for_2;
        if ($num_x == 1) // иначе если оканчивается на 1
            return $form_for_1;
        return $form_for_5;
    }

    public function calculate ($orderId, $deliveryId): array
    {
        $order = Order::find($orderId);
        $orderAddress = UserAddress::find($deliveryId);
        $products = $order->products()->with('product')->get();

        $data = [];
        $errors = [];
        $price = 0;
        $days = 2;

        foreach($products as $product) {
            $leftover = $product->product->leftover;

            if(!empty($leftover)) {
                $res = CDEKService::calculate([
                    'city' => $leftover->warehouse_city,
                    'postal_code' => $leftover->warehouse_postal_code,
                    'address' => $leftover->warehouse_address
                ], [
                    'city' => $orderAddress->city,
                    'postal_code' => $orderAddress->index,
                    'address' => $orderAddress->address
                ], $product->product->category_id);

                if(array_key_exists('tariff_codes', $res)) {
                    $tarif = array_filter($res['tariff_codes'], function($arr) {
                        return ($arr['tariff_code'] == 139);
                    });
                    array_push($data, array_values($tarif)[0]);
                }

                if(array_key_exists('errors', $res)) {
                    array_push($errors, $res['errors'][0]['message']);
                }
            }
        }

        if(count($data) > 0) {
            foreach($data as $item) {
                $days += $item['period_max'];
                $price += $item['delivery_sum'];
            }
        }

        $order->info()->update([
            'delivery_price' => $price,
            'delivery_days' => $days,
        ]);

        return [
            $data,
            $errors,
            CartService::formatCurrency($price),
            $days. ' ' .self::true_wordform($days, 'день', 'дня', 'дней')
        ];
    }

    public function info ($id) {
        $data = CDEKService::info($id);
        return $data;
    }
}

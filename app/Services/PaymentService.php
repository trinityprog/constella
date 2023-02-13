<?php

namespace App\Services;

use App\Models\Currency;
use App\Models\Order;
use App\Models\Payment;
use App\Models\UserAddress;
use Exception;
use Illuminate\Support\Facades\Cookie;

class PaymentService {
    const URL = 'https://epaypost.fortebank.com/Exec';
    const MERCHANT_ID = 'ZKGROUP02010698';
    const CURRENCIES = [
        'USD' => 840,
        'KZT' => 398,
        'RUB' => 810,
        'EUR' => 978
    ];

    public function sendXML ($xml) {
        $curl = curl_init(self::URL);
        curl_setopt ($curl, CURLOPT_HTTPHEADER, array("Content-Type: text/xml"));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        if(curl_errno($curl)){
            throw new Exception(curl_error($curl));
        }
        curl_close($curl);
        return $result;
    }

    public function pay ($order)
    {
        $currency = self::CURRENCIES[strtoupper(Cookie::get('currency'))];
        $amount = intval($order->getFullSumm()).'00';
//        $amount = 500;
        $xml = '<?xml version="1.0" encoding="UTF-8"?><TKKPG><Request><Operation>CreateOrder</Operation><Language>RU</Language><Order><OrderType>Purchase</OrderType><Merchant>'.self::MERCHANT_ID.'</Merchant><Amount>'.$amount.'</Amount><Currency>'.$currency.'</Currency><Description>Оплата заказа - '.$order->unique_id.'</Description><ApproveURL>'.route('order.status.success', $order->id).'</ApproveURL><CancelURL>'.route('order.status.cancel', $order->id).'</CancelURL><DeclineURL>'.route('order.status.error', $order->id).'</DeclineURL><AddParams><FA-DATA>Email='.auth()->user()->email.'</FA-DATA><OrderExpirationPeriod>0</OrderExpirationPeriod></AddParams></Order></Request></TKKPG>';
        $response = simplexml_load_string($this->sendXML($xml));
        $json = json_encode($response);
        $res = json_decode($json, TRUE);
        $orderResponse = $res['Response']['Order'];
        $payUrl = $orderResponse['URL']. '?OrderID='.$orderResponse['OrderID'].'&SessionID='.$orderResponse['SessionID'];

        Payment::create([
            'order_id' => $order->id,
            'order_payment_id' => $orderResponse['OrderID'],
            'session_payment_id' => $orderResponse['SessionID'],
            'status' => 'Created',
            'req' => $json
        ]);

        return redirect()->to($payUrl)->send();
    }

}

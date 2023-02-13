<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class Bitrix24Service
{
    public function send($method, $params = [])
    {
        $url = 'https://constella.bitrix24.kz/rest/53/312wfpikcqecg0o6/' . $method;

        $client = Http::post($url, $params);

        return collect($client->object())->recursive();
    }

    public function addDeal($params)
    {
        return $this->send('crm.deal.add', $params);
    }

    public function setProductrowsDeal($params)
    {
        return $this->send('crm.deal.productrows.set', $params);
    }

    public function addProduct($params)
    {
        return $this->send('crm.product.add', $params);
    }

    public function listProduct($params = [])
    {
        return $this->send('crm.product.list', $params);
    }

    public function sendCustomMethod($method, $params = [])
    {
        return $this->send($method, $params);
    }

    public function handleOrder($order)
    {

        $comments = 'Контакты:' . "<br><br>"
            . 'Email: ' . auth()->user()->email . "<br>"
            . 'Имя: ' . auth()->user()->name . "<br>"
            . 'Телефон: ' . auth()->user()->phone . "<br><br>"
            . 'Информация о получателе:' . "<br><br>"
            . 'ФИО: ' . $order->info->recipient_fio . "<br>"
            . 'Телефон: ' . $order->info->recipient_phone . "<br><br>"
            . 'Информация о заказе:' . "<br><br>"
            . 'Тип доставки: ' . ($order->info->delivery_type == 'selfpickup'
                ? ('Самовывоз' . ' - ' . $order->info->delivery_pickup)
                : ('Адрес и способ доставки : '
                    . $order->info->address->country .', '. $order->info->address->city .', '.  $order->info->address->index .', '. $order->info->address->address . ' - '
                    . 'CDEK - ' . $order->info->delivery_price)) . "<br>"
            . 'Итог: ' . $order->full_summ . "<br>"
            . 'Номер заказа: ' . $order->unique_id . "<br>";

        $addDealRes = $this->addDeal([
           'fields' => [
               'TITLE' => 'Заказ на сайте',
               'CATEGORY_ID' => 13,
               'COMMENTS' => $comments
           ]
        ]);

        $prodRows = [];

        $order_products = $order->products()
            ->with('product')->get();

        foreach ($order_products as $p) {
            $prodBitrixId = 0;

            $prodListRes = $this->listProduct([
                'filter' => ['XML_ID' => $p->product->code]
            ]);

            if($prodListRes->result->isNotEmpty()) $prodBitrixId = $prodListRes->result->first()->ID;
            else {
                $AddProdRes = $this->addProduct([
                    'fields' => [
                        'NAME' => $p->product->name,
                        'PRICE' => $p->product->price,
                        'CURRENCY_ID' => $p->product->currency->code,
                        'XML_ID' => $p->product->code,
                    ]
                ]);
                $prodBitrixId = $AddProdRes->result;
            }

            $prodRows []= [
                'PRODUCT_ID' => $prodBitrixId,
                'QUANTITY' => $p->count
            ];
        }

        $this->setProductrowsDeal([
            'id' => $addDealRes->result,
            'rows' => $prodRows
        ]);
    }

    public function handleCustomerRequest($c_request)
    {
        $comments = 'Инфо ' . "<br><br>"
            . 'Имя: ' . $c_request->name . "<br>"
            . 'Телефон: ' . $c_request->phone . "<br>"
            . 'Тип формы: ' . $c_request->typeName . "<br>"
            . 'Тема: ' . $c_request->theme->name_ru . "<br>"
            . 'Удобное время: ' . $c_request->time_from . '-' . $c_request->time_to . "<br>";

        $addDealRes = $this->addDeal([
           'fields' => [
               'TITLE' => 'Заявка - ' . $c_request->typeName,
               'CATEGORY_ID' => 13,
               'COMMENTS' => $comments
           ]
        ]);
    }

    public function handleGeomaOrder($geomaOrder)
    {
        $comments = 'Инфо ' . "<br><br>"
            . 'Имя: ' . $geomaOrder->name . "<br>"
            . 'Фамилия: ' . $geomaOrder->surname . "<br>"
            . 'Телефон: ' . $geomaOrder->phone . "<br>"
            . 'Email: ' . $geomaOrder->email . "<br>"
            . 'Стоимость: ' . $geomaOrder->price . "<br>"
            . 'Figures: ' . json_encode($geomaOrder->figures,JSON_UNESCAPED_UNICODE) . "<br>"
            . 'Connection: ' . $geomaOrder->connection . "<br>";

        $addDealRes = $this->addDeal([
            'fields' => [
                'TITLE' => 'Заявка Geoma',
                'CATEGORY_ID' => 13,
                'COMMENTS' => $comments
            ]
        ]);
    }

    public function handleReturnsRequest($returnsRequestr)
    {
        $comments = 'Инфо ' . "<br><br>"
            . 'Номер заказа: ' . $returnsRequestr['order_number'] . "<br>"
            . 'ФИО: ' . $returnsRequestr['name'] . "<br>"
            . 'Телефон: ' . $returnsRequestr['phone'] . "<br>"
            . 'Причина возврата: ' . $returnsRequestr['reason'] . "<br>"
            . 'Город: ' . $returnsRequestr['city'] . "<br>"
            . 'Адрес: ' . $returnsRequestr['address'] . "<br>";

        $addDealRes = $this->addDeal([
            'fields' => [
                'TITLE' => 'Заявка на возврат',
                'CATEGORY_ID' => 13,
                'COMMENTS' => $comments
            ]
        ]);
    }

    public function handleRepairRequest($repairRequestr)
    {
        $comments = 'Инфо ' . "<br><br>"
            . 'Имя: ' . $repairRequestr->name . "<br>"
            . 'Телефон: ' . $repairRequestr->phone . "<br>"
            . 'Тема: ' . $repairRequestr->type . "<br>"
            . 'Удобное время: ' . $repairRequestr->time_from . ' - ' . $repairRequestr->time_to . "<br>";

        $addDealRes = $this->addDeal([
            'fields' => [
                'TITLE' => 'Чистка и ремонт ювелирных изделий',
                'CATEGORY_ID' => 13,
                'COMMENTS' => $comments
            ]
        ]);
    }
}

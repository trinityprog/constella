<?php

namespace App\Services;

use CdekSDK2\Exceptions\AuthException;

class CDEKService {

    const ACCOUNT = 'nX56Dg5bcVP53wfWgQ2yCDynqWuLT3WU';
    const SECURE = 'mpgr11bBcPYtdEcS61YI1ChalRLAhrc1';
    const URL = 'https://api.cdek.ru/v2/calculator/tarifflist';
    const ORDER_URL = 'https://api.cdek.ru/v2/orders';

    const SIZES = [
        '1' => [
            "length" =>  15,
            "width" =>  15,
            "height" =>  10,
            "weight" =>  3000,
        ],
        '2' => [
            "length" =>  45,
            "width" =>  27,
            "height" =>  20,
            "weight" =>  4000,
        ],
        '3' => [
            "length" =>  44,
            "width" =>  26,
            "height" =>  20,
            "weight" =>  3000,
        ]
    ];

    public static function info ($id)
    {
        $client = new \GuzzleHttp\Client();
        $cdek = new \CdekSDK2\Client($client, self::ACCOUNT, self::SECURE);
        $cdek->setTest(false);

        try {
            $cdek->authorize();
            $token = $cdek->getToken();
            $cdek->getExpire();

            $response = $client->get(self::ORDER_URL.'/'.$id, [
                'headers' => [
                    'Authorization' => 'Bearer '. $token,
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                ],
            ]);

            $json = json_decode($response->getBody(), TRUE);
            return $json;
        } catch (AuthException $exception) {
            echo $exception->getMessage();
        }
    }

    public static function calculate ($from, $to, $category)
    {
        $client = new \GuzzleHttp\Client();
        $cdek = new \CdekSDK2\Client($client, self::ACCOUNT, self::SECURE);
        $cdek->setTest(false);

        try {
            $cdek->authorize();
            $token = $cdek->getToken();
            $cdek->getExpire();

            $response = $client->post(self::URL, [
                'headers' => [
                    'Authorization' => 'Bearer '. $token,
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                ],
                'json' => [
                    'type' => 1,
                    'tariff_code' => 293,
                    'currency' => 2,
                    'from_location' => [
                        'city' => $from['city'],
                        'postal_code' => $from['postal_code'],
                        'address' => $from['address'],
                    ],
                    'to_location' => [
                        'city' => $to['city'],
                        'postal_code' => $to['postal_code'],
                        'address' => $to['address'],
                    ],
                    'packages' => self::SIZES[$category]
                ]
            ]);

            $json = json_decode($response->getBody(), TRUE);
            dd($json);
            return $json;
        } catch (AuthException $exception) {
            echo $exception->getMessage();
        }
    }

    public static function create ($from, $to, $product, $order) {
        $client = new \GuzzleHttp\Client();
        $cdek = new \CdekSDK2\Client($client, self::ACCOUNT, self::SECURE);
        $cdek->setTest(false);

        try {
            $cdek->authorize();
            $token = $cdek->getToken();
            $cdek->getExpire();

            if($from['city'] === 'Алматы' || $to['city'] === 'Алматы') {
                $cityCode = 4756;
            }elseif($from['city'] === 'Нур Султан' || $to['city'] === 'Нур Султан') {
                $cityCode = 4961;
            }elseif($from['city'] === 'Шымкент' || $to['city'] === 'Шымкент') {
                $cityCode = 12787;
            }else {
                $cityCode = 4756;
            }

            $test = [
                "comment" => $order->unique_id. " - Новый заказ",
                "from_location" => [
                    "code" => $cityCode,
                    "fias_guid" => "",
                    "postal_code" => "",
                    "longitude" => "",
                    "latitude" => "",
                    "country_code" => "",
                    "region" => "",
                    "sub_region" => "",
                    'city' => $from['city'],
                    "kladr_code" => "",
                    'address' => $from['address'],
                ],
                "to_location" => [
                    "code" => $cityCode,
                    "fias_guid" => "",
                    "postal_code" => "",
                    "longitude" => "",
                    "latitude" => "",
                    "country_code" => "",
                    "region" => "",
                    "sub_region" => "",
                    'city' => $to['city'],
                    "kladr_code" => "",
                    'address' => $to['address'],
                ],
                "packages" => [
                    [
                        'number' => $product->product->id,
                        "comment" => "Упаковка - ". $order->info->package_type,
                        "items" => [
                            [
                                'ware_key' => $product->product->vendor_code,
                                "payment" => [
                                    "value" => 0
                                ],
                                'name' => $product->product->name,
                                'cost' => $product->price,
                                'amount' => $product->count,
                                'weight' => 350,
                            ]
                        ],
                        "length" => self::SIZES[$product->product->category_id]['length'],
                        "width" => self::SIZES[$product->product->category_id]['width'],
                        "height" => self::SIZES[$product->product->category_id]['height'],
                        "weight" => self::SIZES[$product->product->category_id]['weight'],
                    ]
                ],
                "recipient" => [
                    "name" => $order->info->recipient_fio,
                    "phones" => [
                        [
                            "number" => $order->info->recipient_phone
                        ]
                    ]
                ],
                "sender" => [
                    "company" => "STELLA KAZAKHSTAN",
                    'name' => 'Дамели',
                    'phones' => [
                        [
                            'number' => '77477261670'
                        ]
                    ]
                ],
                "tariff_code" => 139
            ];

            try {
                $response = $client->post(self::ORDER_URL, [
                    'headers' => [
                        'Authorization' => 'Bearer '. $token,
                        'Accept'        => 'application/json',
                        'Content-Type'  => 'application/json',
                    ],
                    'json' => $test
                ]);
            } catch (\Exception $e) {
                dd($e);
            }

            $json = json_decode($response->getBody(), TRUE);
            return $json;
        } catch (AuthException $exception) {
            echo $exception->getMessage();
        }
    }

}

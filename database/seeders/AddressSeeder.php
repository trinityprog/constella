<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\AddressCity;
use DB;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Address::query()->truncate();
        AddressCity::query()->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $city = AddressCity::create([
            'name' => [
                'ru' => 'Алматы',
                'kz' => 'Алматы',
                'en' => 'Almaty',
            ],
            'coordinates' => [
                'x' => '43.2566700',
                'y' => '76.9286100'
            ]
        ]);

        $city->addresses()->create([
            'name' => [
                'ru' => 'Esentai Mall',
                'kz' => 'Esentai Mall',
                'en' => 'Esentai Mall',
            ],
            'info' => [
                'ru' => 'Аль-Фараби, 110',
                'kz' => 'Аль-Фараби, 110',
                'en' => 'Al-Farabi avenue, 110E',
            ],
            'phones' => ['+7 (727) 331-10-30', '+7 (701) 765-02-39'],
            'brands' => [1, 2],
            'coordinates' => [
                'x' => '43.21857041417427',
                'y' => '76.92763451158555'
            ]
        ]);
        $city->addresses()->create([
            'name' => [
                'ru' => 'Rixos Almaty',
                'kz' => 'Rixos Almaty',
                'en' => 'Rixos Almaty',
            ],
            'info' => [
                'ru' => 'Сейфулина, 506/99',
                'kz' => 'Сейфулина, 506/99',
                'en' => 'Seifullin avenue, 506/99',
            ],
            'phones' => ['+7 (727) 267-54-28', '+7 (701) 111-62-87'],
            'brands' => [1, 8, 27, 34],
            'coordinates' => [
                'x' => '43.24952985993448',
                'y' => '76.93406105633242'
            ]
        ]);

        $city = AddressCity::create([
            'name' => [
                'ru' => 'Нур-Султан',
                'kz' => 'Нур-Султан',
                'en' => 'Nur-Sultan',
            ],
            'coordinates' => [
                'x' => '51.12519311990613',
                'y' => '71.43183841178733'
            ]
        ]);

        $city->addresses()->create([
            'name' => [
                'ru' => 'Talan Gallery',
                'kz' => 'Talan Gallery',
                'en' => 'Talan Gallery',
            ],
            'info' => [
                'ru' => 'Достык, 16',
                'kz' => 'Достык, 16',
                'en' => 'Dostyk street 16',
            ],
            'phones' => ['+7 (717) 248-39-75', '+7 (701) 774-10-74'],
            'brands' => [1, 8],
            'coordinates' => [
                'x' => '51.12519311990613',
                'y' => '71.43183841178733'
            ]
        ]);

        $city = AddressCity::create([
            'name' => [
                'ru' => 'Шымкент',
                'kz' => 'Шымкент',
                'en' => 'Shymkent',
            ],
            'coordinates' => [
                'x' => '42.32549590903967',
                'y' => '69.59626249991666'
            ]
        ]);

        $city->addresses()->create([
            'name' => [
                'ru' => 'Rixos Khadisha',
                'kz' => 'Rixos Khadisha',
                'en' => 'Rixos Khadisha',
            ],
            'info' => [
                'ru' => 'Желтоксан, 17',
                'kz' => 'Желтоксан, 17',
                'en' => 'Zheltoksan street, 17',
            ],
            'phones' => ['+7 (727) 561-30-30', '+7 (777) 765-02-09'],
            'brands' => [1, 8],
            'coordinates' => [
                'x' => '42.32549590903967',
                'y' => '69.59626249991666'
            ]
        ]);
    }
}

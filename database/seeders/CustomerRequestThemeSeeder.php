<?php

namespace Database\Seeders;

use App\Models\CustomerRequestTheme;
use Illuminate\Database\Seeder;

class CustomerRequestThemeSeeder extends Seeder
{
    //php artisan db:seed --class=CustomerRequestThemeSeeder

    public function run()
    {
        CustomerRequestTheme::create([
            'name_ru' => 'Консультация по ювелирным изделиям',
            'name_en' => 'Consultation on jewelry',
            'name_kz' => 'Зергерлік бұйымдар бойынша кеңес беру',
        ]);
        CustomerRequestTheme::create([
            'name_ru' => 'Консультация по бренду ZARDOZI',
            'name_en' => 'Consultation on ZARDOZI brand',
            'name_kz' => 'ZARDOZI бренді бойынша кеңес беру',
        ]);
        CustomerRequestTheme::create([
            'name_ru' => 'Оформление заказа',
            'name_en' => 'Ordering',
            'name_kz' => 'Тапсырысты ресімдеу',
        ]);
        CustomerRequestTheme::create([
            'name_ru' => 'Возват товара',
            'name_en' => 'Return of goods',
            'name_kz' => 'Тауарды қайтару',
        ]);
        CustomerRequestTheme::create([
            'name_ru' => 'Ремонт/Чистка ювелирных изделий',
            'name_en' => 'Repair/cleaning of jewelry',
            'name_kz' => 'Зергерлік бұйымдарды тазалау/жөндеу',
        ]);
        CustomerRequestTheme::create([
            'name_ru' => 'Возврат денежных средств',
            'name_en' => 'Return of the money paid',
            'name_kz' => 'Ақшалай қаржыларды қайтару',
        ]);
    }
}

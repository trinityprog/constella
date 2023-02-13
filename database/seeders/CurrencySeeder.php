<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    public function run()
    {
        Currency::create(['name' => 'Тенге', 'code' => 'KZT', 'symbol' => '₸', 'value' => 1]);
        Currency::create(['name' => 'Доллар', 'code' => 'USD', 'symbol' => '$', 'value' => 427.11]);
        Currency::create(['name' => 'Евро', 'code' => 'EUR', 'symbol' => '€', 'value' => 497.5]);
        Currency::create(['name' => 'Рубль', 'code' => 'RUB', 'symbol' => '₽', 'value' => 6.11]);
    }
}

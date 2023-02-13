<?php
namespace Database\Seeders;

use App\Models\Filter;
use Illuminate\Database\Seeder;

class FiltersSeeder extends Seeder
{
    public function run()
    {
        Filter::create(['name' => 'Цвет', 'type' => 'color']);
        Filter::create(['name' => 'Код цвета', 'type' => 'color_code']);
        Filter::create(['name' => 'Размер', 'type' => 'size']);
        Filter::create(['name' => 'Бренд', 'type' => 'brand']);
        Filter::create(['name' => 'Коллекция', 'type' => 'collection']);
        Filter::create(['name' => 'Цвет металла', 'type' => 'metal_color']);
        Filter::create(['name' => 'Тип товара', 'type' => 'product_type']);
        Filter::create(['name' => 'Тип товара (мн)', 'type' => 'product_type_multiple']);
        Filter::create(['name' => 'Масса', 'type' => 'mass']);
        Filter::create(['name' => 'Вид камня', 'type' => 'stone_type']);
        Filter::create(['name' => 'Каратность', 'type' => 'carat']);
        Filter::create(['name' => 'Марка', 'type' => 'stamp']);
        Filter::create(['name' => 'Состав', 'type' => 'composition']);
        Filter::create(['name' => 'Подклад', 'type' => 'lining']);
        Filter::create(['name' => 'Номенклатурная Группа', 'type' => 'nomenclature_group']);
        Filter::create(['name' => 'Страна производства', 'type' => 'country_provider']);
        Filter::create(['name' => 'Сезон', 'type' => 'cloth_season']);
        Filter::create(['name' => 'Материал одежды', 'type' => 'cloth_material']);
        Filter::create(['name' => 'Пол', 'type' => 'sex']);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        $her = Type::create(['name' => 'Для неё', 'order' => 1, 'slug' => 'female']);
        $him = Type::create(['name' => 'Для него', 'order' => 2, 'slug' => 'male']);
        $kids = Type::create(['name' => 'Детям', 'order' => 3, 'slug' => 'kids']);

        $jew = $her->categories()->create(['name' => 'Ювелирные изделия', 'code' => '3', 'image' => 'jew-prod.jpg']);
        $interier = $her->categories()->create(['name' => 'Интерьер', 'code' => '1', 'image' => 'inter.jpg']);
        $clothes = $her->categories()->create(['name' => 'Одежда', 'code' => '2', 'image' => 'cloth-bra.jpg']);

        $jewSub = $her->categories()->create(['name' => 'Ювелирные украшения', 'code' => '5', 'parent' => $jew->id]);
        $jewAcc = $her->categories()->create(['name' => 'Аксессуары', 'code' => '1', 'parent' => $jew->id]);

//        Menu::create(['category_id' => $jewSub->id, 'name' => 'Кольца', 'status' => true]);
//        Menu::create(['category_id' => $jewSub->id, 'name' => 'Браслеты', 'status' => true]);
//        Menu::create(['category_id' => $jewSub->id, 'name' => 'Колье', 'status' => true]);
//        Menu::create(['category_id' => $jewSub->id, 'name' => 'Кулоны', 'status' => true]);

        $intSub = $her->categories()->create(['name' => 'Для дома', 'code' => '3', 'parent' => $interier->id]);
        $intAcc = $her->categories()->create(['name' => 'Аксессуары', 'code' => '1', 'parent' => $interier->id]);

        $clothSub = $her->categories()->create(['name' => 'Верхняя одежда', 'code' => '2', 'parent' => $clothes->id]);
        $clothSub1 = $her->categories()->create(['name' => 'Нижнее белье', 'code' => '4', 'parent' => $clothes->id]);
        $clothAcc = $her->categories()->create(['name' => 'Аксессуары', 'code' => '1', 'parent' => $clothes->id]);

        // categories
//        $jewerly = $her->categories()->create(['name' => 'Ювелирные украшения', 'image' => 'jew-prod.jpg', 'slug' => 'jewerly']);
//
//        $cats = $her->categories()->create(['name' => 'Категории', 'parent' => $jewerly->id]);
//        $her->categories()->create(['name' => 'Кольца', 'parent' => $cats->id]);
//        $her->categories()->create(['name' => 'Колье', 'parent' => $cats->id]);
//        $her->categories()->create(['name' => 'Браслеты', 'parent' => $cats->id]);
//        $her->categories()->create(['name' => 'Серьги', 'parent' => $cats->id]);
//        $her->categories()->create(['name' => 'Броши', 'parent' => $cats->id]);
//        $her->categories()->create(['name' => 'Тумар', 'parent' => $cats->id]);
//        $her->categories()->create(['name' => 'Заколки', 'parent' => $cats->id]);
//        $her->categories()->create(['name' => 'Часы', 'parent' => $cats->id]);
//
//        $wed = $her->categories()->create(['name' => 'Свадебные украшения', 'parent' => $jewerly->id]);
//        $her->categories()->create(['name' => 'Обручальные кольца', 'parent' => $wed->id]);
//        $her->categories()->create(['name' => 'Кольца для помолвки', 'parent' => $wed->id]);
//        $her->categories()->create(['name' => 'Серьги', 'parent' => $wed->id]);
//        $her->categories()->create(['name' => 'Колье', 'parent' => $wed->id]);
//        $her->categories()->create(['name' => 'Браслеты', 'parent' => $wed->id,]);
//        $her->categories()->create(['name' => 'Кулоны', 'parent' => $wed->id]);
//
//        // categories
//        $clothes = $her->categories()->create(['name' => 'Одежда', 'image' => 'cloth-bra.jpg', 'slug' => 'clothes']);
//
//        $tclo = $her->categories()->create(['name' => 'Верхняя одежда', 'parent' => $clothes->id]);
//        $her->categories()->create(['name' => 'Платья', 'parent' => $tclo->id]);
//        $her->categories()->create(['name' => 'Жакеты', 'parent' => $tclo->id]);
//        $her->categories()->create(['name' => 'Юбки', 'parent' => $tclo->id]);
//        $her->categories()->create(['name' => 'Брюки', 'parent' => $tclo->id]);
//        $her->categories()->create(['name' => 'Комбинезоны', 'parent' => $tclo->id]);
//        $her->categories()->create(['name' => 'Костюмы', 'parent' => $tclo->id]);
//        $her->categories()->create(['name' => 'Куртки', 'parent' => $tclo->id]);
//        $her->categories()->create(['name' => 'Пальто', 'parent' => $tclo->id]);
//
//        $bclo = $her->categories()->create(['name' => 'Нижнее белье', 'parent' => $clothes->id]);
//        $her->categories()->create(['name' => 'Бюстгальтеры', 'parent' => $bclo->id]);
//        $her->categories()->create(['name' => 'Пижамы', 'parent' => $bclo->id]);
//        $her->categories()->create(['name' => 'Халаты', 'parent' => $bclo->id]);
//        $her->categories()->create(['name' => 'Трусы', 'parent' => $bclo->id]);
//        $her->categories()->create(['name' => 'Боди', 'parent' => $bclo->id]);
//        $her->categories()->create(['name' => 'Топы', 'parent' => $bclo->id]);
//        $her->categories()->create(['name' => 'Брюки', 'parent' => $bclo->id]);
//        $her->categories()->create(['name' => 'Рубашки', 'parent' => $bclo->id]);
//
//        $acces = $her->categories()->create(['name' => 'Аксессуары', 'parent' => $clothes->id]);
//        $her->categories()->create(['name' => 'Сумки', 'parent' => $acces->id]);
//        $her->categories()->create(['name' => 'Головные уборы', 'parent' => $acces->id]);
//        $her->categories()->create(['name' => 'Косметички', 'parent' => $acces->id]);
//        $her->categories()->create(['name' => 'Шарфы', 'parent' => $acces->id]);
//        $her->categories()->create(['name' => 'Маски', 'parent' => $acces->id]);
//
//        // categories
//        $interior = $her->categories()->create(['name' => 'Интерьер', 'image' => 'inter.jpg', 'slug' => 'interior']);
//
//        $home = $her->categories()->create(['name' => 'Категории HOME', 'parent' => $interior->id]);
//        $her->categories()->create(['name' => 'Ковры', 'parent' => $home->id]);
//        $her->categories()->create(['name' => 'Картины', 'parent' => $home->id]);
//        $her->categories()->create(['name' => 'Вазы', 'parent' => $home->id]);
//        $her->categories()->create(['name' => 'Лампы', 'parent' => $home->id]);
//        $her->categories()->create(['name' => 'Книги', 'parent' => $home->id]);
//        $her->categories()->create(['name' => 'Статуэтки', 'parent' => $home->id]);
//        $her->categories()->create(['name' => 'Мебель', 'parent' => $home->id]);
//        $her->categories()->create(['name' => 'Скульптуры', 'parent' => $home->id]);
//        $her->categories()->create(['name' => 'Часы', 'parent' => $home->id]);
//
//        // categories
//        $youth = $her->categories()->create(['name' => 'Молодежь', 'image' => 'youth.jpg', 'slug' => 'youth']);
//
//        $jeews = $her->categories()->create(['name' => 'Ювелирные украшения', 'parent' => $youth->id]);
//        $her->categories()->create(['name' => 'Кольца', 'parent' => $jeews->id]);
//        $her->categories()->create(['name' => 'Колье', 'parent' => $jeews->id]);
//        $her->categories()->create(['name' => 'Браслеты', 'parent' => $jeews->id]);
//        $her->categories()->create(['name' => 'Серьги', 'parent' => $jeews->id]);
//        $her->categories()->create(['name' => 'Броши', 'parent' => $jeews->id]);
//        $her->categories()->create(['name' => 'Тумар', 'parent' => $jeews->id]);
//        $her->categories()->create(['name' => 'Заколки', 'parent' => $jeews->id]);
//        $her->categories()->create(['name' => 'Часы', 'parent' => $jeews->id]);
//        $her->categories()->create(['name' => 'Обручальные кольца', 'parent' => $jeews->id]);
//        $her->categories()->create(['name' => 'Кольца для помолвки', 'parent' => $jeews->id]);
//        $her->categories()->create(['name' => 'Серьги', 'parent' => $jeews->id]);
//        $her->categories()->create(['name' => 'Колье', 'parent' => $jeews->id]);
//        $her->categories()->create(['name' => 'Браслеты', 'parent' => $jeews->id]);
//        $her->categories()->create(['name' => 'Кулоны', 'parent' => $jeews->id]);
//
//        $cth = $her->categories()->create(['name' => 'Одежда', 'parent' => $youth->id]);
//        $her->categories()->create(['name' => 'Платья', 'parent' => $cth->id]);
//        $her->categories()->create(['name' => 'Жакеты', 'parent' => $cth->id]);
//        $her->categories()->create(['name' => 'Юбки', 'parent' => $cth->id]);
//        $her->categories()->create(['name' => 'Брюки', 'parent' => $cth->id]);
//        $her->categories()->create(['name' => 'Комбинезоны', 'parent' => $cth->id]);
//        $her->categories()->create(['name' => 'Костюмы', 'parent' => $cth->id]);
//        $her->categories()->create(['name' => 'Куртки', 'parent' => $cth->id]);
//        $her->categories()->create(['name' => 'Пальто', 'parent' => $cth->id]);
//
//        $bclo = $her->categories()->create(['name' => 'Нижнее белье', 'parent' => $youth->id]);
//        $her->categories()->create(['name' => 'Бюстгальтеры', 'parent' => $bclo->id]);
//        $her->categories()->create(['name' => 'Пижамы', 'parent' => $bclo->id]);
//        $her->categories()->create(['name' => 'Халаты', 'parent' => $bclo->id]);
//        $her->categories()->create(['name' => 'Трусы', 'parent' => $bclo->id]);
//        $her->categories()->create(['name' => 'Боди', 'parent' => $bclo->id]);
//        $her->categories()->create(['name' => 'Топы', 'parent' => $bclo->id]);
//        $her->categories()->create(['name' => 'Брюки', 'parent' => $bclo->id]);
//        $her->categories()->create(['name' => 'Рубашки', 'parent' => $bclo->id]);
//
//        $acces = $her->categories()->create(['name' => 'Аксессуары', 'parent' => $youth->id]);
//        $her->categories()->create(['name' => 'Сумки', 'parent' => $acces->id]);
//        $her->categories()->create(['name' => 'Головные уборы', 'parent' => $acces->id]);
//        $her->categories()->create(['name' => 'Косметички', 'parent' => $acces->id]);
//        $her->categories()->create(['name' => 'Шарфы', 'parent' => $acces->id]);
//        $her->categories()->create(['name' => 'Маски', 'parent' => $acces->id]);
    }
}

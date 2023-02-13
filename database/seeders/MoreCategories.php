<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Type;
use Illuminate\Database\Seeder;

class MoreCategories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $him = Type::find(2);
        $him->categories()->create(['name' => 'Ювелирные изделия', 'code' => '3', 'image' => 'jew-prod.jpg']);
        $him->categories()->create(['name' => 'Интерьер', 'code' => '1', 'image' => 'inter.jpg']);
        $him->categories()->create(['name' => 'Одежда', 'code' => '2', 'image' => 'cloth-bra.jpg']);

        $kids = Type::find(3);
        $kids->categories()->create(['name' => 'Ювелирные изделия', 'code' => '3', 'image' => 'jew-prod.jpg']);
        $kids->categories()->create(['name' => 'Интерьер', 'code' => '1', 'image' => 'inter.jpg']);
        $kids->categories()->create(['name' => 'Одежда', 'code' => '2', 'image' => 'cloth-bra.jpg']);
    }
}

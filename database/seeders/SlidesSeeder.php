<?php

namespace Database\Seeders;

use App\Models\Slide;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlidesSeeder extends Seeder
{
    public function run()
    {
        DB::table('slides')->truncate();

        Slide::create([
            'name' => 'Zardozi',
            'image' => '1.jpg',
            'link' => route('page.index'),
            'type_id' => 1
        ]);

        Slide::create([
            'name' => 'La perla',
            'image' => '2.jpg',
            'link' => route('page.index'),
            'type_id' => 1
        ]);

        Slide::create([
            'name' => 'Bee Goddess',
            'image' => '3.jpg',
            'link' => route('page.index'),
            'type_id' => 1
        ]);
    }
}

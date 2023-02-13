<?php

namespace Database\Seeders;

use App\Models\SizeGuide;
use Illuminate\Database\Seeder;

class SizeGuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bracelet = SizeGuide::create([
            'menu_ids' => '2',
            'filename' => 'Jewellery_BRACELET',
        ]);

        $rings = SizeGuide::create([
            'menu_ids' => '1',
            'filename' => 'Jewellery_RING',
        ]);

        $underwear = SizeGuide::create([
            'menu_ids' => '44,52',
            'filename' => 'underwear',
        ]);

        $body = SizeGuide::create([
            'menu_ids' => '43',
            'filename' => 'body',
        ]);

        $halati = SizeGuide::create([
            'menu_ids' => '26,21,36',
            'filename' => 'halati',
        ]);

        $pijamas = SizeGuide::create([
            'menu_ids' => '46,49',
            'filename' => 'pijamas',
        ]);

        $clothes = SizeGuide::create([
            'menu_ids' => '17,18,24,27,28,29,30,31,32,34,35,37,41,48',
            'filename' => 'wclothes',
        ]);

        $beachwear = SizeGuide::create([
            'menu_ids' => '25,45',
            'filename' => 'beachwear',
        ]);
    }
}

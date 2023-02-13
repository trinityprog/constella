<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('types')->truncate();
        DB::table('categories')->truncate();
        DB::table('currencies')->truncate();
        DB::table('users')->truncate();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@zhannakangroup.com',
            'password' => bcrypt('6V(J2)"/~`Qga>PD'),
            'sex' => '-',
            'status' => true,
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Manager1',
            'email' => 'manager1@zhannakangroup.com',
            'password' => bcrypt('*dmf9d%3D+9s56a^'),
            'sex' => '-',
            'status' => true,
            'role' => 'manager'
        ]);

        User::create([
            'name' => 'Manager2',
            'email' => 'manager2@zhannakangroup.com',
            'password' => bcrypt('y]*]g{LuG9D!@4u3'),
            'sex' => '-',
            'status' => true,
            'role' => 'manager'
        ]);

        User::create([
            'name' => 'Manager3',
            'email' => 'manager3@zhannakangroup.com',
            'password' => bcrypt(',xR^y!GT*b9Cb,"V'),
            'sex' => '-',
            'status' => true,
            'role' => 'manager'
        ]);


        User::create([
            'name' => 'Manager4',
            'email' => 'manager4@zhannakangroup.com',
            'password' => bcrypt('t:Q6Drb5%:p}J`Z]'),
            'sex' => '-',
            'status' => true,
            'role' => 'manager'
        ]);

        User::create([
            'name' => 'Manager5',
            'email' => 'manager5@zhannakangroup.com',
            'password' => bcrypt('&yt&y$5JB`w4z8G('),
            'sex' => '-',
            'status' => true,
            'role' => 'manager'
        ]);

        $this->call([
            CategoriesSeeder::class,
            FiltersSeeder::class,
            CurrencySeeder::class,
            CustomerRequestThemeSeeder::class,
//            ProductsSeeder::class
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

//        $file_path = resource_path('../database/seeders/constella_01_12_2022_12_32.sql');
//
//        \DB::unprepared(
//            file_get_contents($file_path)
//        );
    }
}

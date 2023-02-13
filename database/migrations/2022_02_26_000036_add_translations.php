<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTranslations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('types', function (Blueprint $table) {
            $table->string('name_en')->nullable()->after('name');
            $table->string('name_kz')->nullable()->after('name_en');
        });

        Schema::table('menu', function (Blueprint $table) {
            $table->string('name_en')->nullable()->after('name');
            $table->string('name_kz')->nullable()->after('name_en');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->string('name_en')->nullable()->after('name');
            $table->string('name_kz')->nullable()->after('name_en');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('types', function (Blueprint $table) {
            //
        });
    }
}

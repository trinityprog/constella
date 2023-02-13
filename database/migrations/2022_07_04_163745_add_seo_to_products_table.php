<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSeoToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('title')->nullable();
            $table->text('seo_description')->nullable();
            $table->string('H1')->nullable();
            $table->string('H2')->nullable();
            $table->string('H3')->nullable();
            $table->string('H4')->nullable();
            $table->string('H5')->nullable();
            $table->string('H6')->nullable();
            $table->string('keywords')->nullable();
            $table->text('seo_text')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}

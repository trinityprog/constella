<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsCharactersticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_characterstics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('size')->nullable();
            $table->string('brand')->nullable();
            $table->string('collection')->nullable();
            $table->string('metal_color')->nullable();
            $table->string('mass')->nullable();
            $table->json('stones')->nullable();
            $table->string('stamp')->nullable();
            $table->string('nomenclature_group')->nullable();
            $table->string('color')->nullable();
            $table->string('color_code')->nullable();
            $table->string('sex')->nullable();
            $table->string('lining')->nullable();
            $table->string('composition')->nullable();
            $table->string('country_provider')->nullable();
            $table->json('cloth_material')->nullable();
            $table->string('cloth_season')->nullable();
            $table->string('product_type')->nullable();
            $table->string('product_type_multiple')->nullable();
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_characterstics');
    }
}

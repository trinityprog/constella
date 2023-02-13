<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->text('name');
            $table->text('slug');
            $table->string('price');
            $table->string('vendor_code');
            $table->text('vendor_slug')->nullable();
            $table->string('parent_vendor_code')->nullable();
            $table->string('code');
            $table->text('description')->nullable();

            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id');
            $table->unsignedBigInteger('menu_id')->nullable();

            $table->integer('discount')->default(0);
            $table->unsignedBigInteger('currency_id')->default(1);
            $table->string('organization');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeftoversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leftovers', function (Blueprint $table) {
            $table->id();

            $table->string('code');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('warehouse_id');
            $table->string('warehouse_name')->nullable();
            $table->string('warehouse_city')->nullable();
            $table->string('warehouse_address')->nullable();
            $table->string('count')->default('0');

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
        Schema::dropIfExists('leftovers');
    }
}

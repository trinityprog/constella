<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_infos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('order_id');
            $table->string('recipient_fio');
            $table->string('recipient_phone');
            $table->string('delivery_type')->nullable();
            $table->string('delivery_address_id')->nullable();
            $table->string('package_type')->nullable();
            $table->string('delivery_pickup')->nullable();

            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_infos');
    }
}

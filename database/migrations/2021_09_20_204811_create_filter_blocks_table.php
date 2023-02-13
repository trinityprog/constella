<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilterBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filter_blocks', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('filter_id');
            $table->string('value');
            $table->string('slug');
            $table->unsignedBigInteger('product_id');

            $table->foreign('filter_id')->references('id')->on('filters')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('filter_blocks');
    }
}

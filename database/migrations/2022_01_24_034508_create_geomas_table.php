<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeomasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geomas', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->string('connection');
            $table->string('email');
            $table->string('name');
            $table->string('phone');
            $table->string('surname');
            $table->json('figures');
//            $table->integer('price')->default(0);
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
        Schema::dropIfExists('geomas');
    }
}

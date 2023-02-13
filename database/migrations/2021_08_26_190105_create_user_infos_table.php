<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInfosTable extends Migration
{
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id();

            $table->string('surname')->nullable();
            $table->string('phone')->nullable();
            $table->date('dob')->nullable()->default(NULL);
            $table->string('iin')->nullable();
            $table->integer('discount')->default(0);
            $table->integer('bonuses')->default(0);
            $table->unsignedBigInteger('user_id');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_infos');
    }
}

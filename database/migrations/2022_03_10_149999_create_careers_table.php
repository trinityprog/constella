<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('title_ru');
            $table->string('title_en')->nullable();
            $table->string('title_kz')->nullable();
            $table->text('text_ru');
            $table->text('text_en')->nullable();
            $table->text('text_kz')->nullable();
            $table->string('address_ru')->nullable();
            $table->string('address_en')->nullable();
            $table->string('address_kz')->nullable();
            $table->integer('order')->default(1);
            $table->foreignId('brand_id')->constrained('brand_descriptions')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('career_categories')->cascadeOnDelete();
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
        Schema::dropIfExists('careers');
    }
}

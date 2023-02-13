<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->text('description_right')->nullable()->after('description');
            $table->text('description_en')->nullable()->after('description_right');
            $table->text('description_right_en')->nullable()->after('description_en');
            $table->text('description_kz')->nullable()->after('description_right_en');
            $table->text('description_right_kz')->nullable()->after('description_kz');
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
            $table->dropColumn('description_right');
            $table->dropColumn('description_en');
            $table->dropColumn('description_right_en');
            $table->dropColumn('description_kz');
            $table->dropColumn('description_right_kz');
        });
    }
}

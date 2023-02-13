<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixSeoToBrandDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('brand_descriptions', function (Blueprint $table) {
            $table->dropColumn('seo_text');
            $table->text('H1_seo_text')->nullable();
            $table->text('H2_seo_text')->nullable();
            $table->text('H3_seo_text')->nullable();
            $table->text('H4_seo_text')->nullable();
            $table->text('H5_seo_text')->nullable();
            $table->text('H6_seo_text')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('brand_descriptions', function (Blueprint $table) {
            //
        });
    }
}

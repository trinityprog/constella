<?php

use App\Models\ImagesImportZip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesImportZipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_import_zips', function (Blueprint $table) {
            $table->id();
            $table->string('comment');
            $table->tinyInteger('status')->default(ImagesImportZip::NOT_STARTED);
            $table->integer('files_count')->default(0);
            $table->integer('saved_files_count')->default(0);
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
        Schema::dropIfExists('images_import_zips');
    }
}

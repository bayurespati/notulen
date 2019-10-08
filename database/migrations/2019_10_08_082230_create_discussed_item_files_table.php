<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscussedItemFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discussed_item_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('discussed_item_id')->unsigned();
            $table->string('path');
            $table->string('name');
            $table->string('file_extension');
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
        Schema::dropIfExists('discussed_item_files');
    }
}

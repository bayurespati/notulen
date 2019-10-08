<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMsItemHasDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_item_has_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ms_item_id')->unsigned();
            $table->bigInteger('ms_item_detail_id')->unsigned();
            $table->timestamps();

            $table->foreign('ms_item_id')
                ->references('id')
                ->on('ms_items')
                ->onDelete('cascade');

            $table->foreign('ms_item_detail_id')
                ->references('id')
                ->on('ms_item_details')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ms_item_has_detail');
    }
}

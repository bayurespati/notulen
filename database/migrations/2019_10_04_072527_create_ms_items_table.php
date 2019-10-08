<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMsItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ms_item_type_id')->unsigned();
            $table->string('code')->nullable();
            $table->string('name');
            $table->string('alternative_name');
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
        Schema::dropIfExists('ms_items');
    }
}

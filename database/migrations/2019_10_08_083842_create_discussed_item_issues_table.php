<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscussedItemIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discussed_item_issues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('discussed_item_id')->unsigned();
            $table->string('title');
            $table->string('details');
            $table->string('solution');
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
        Schema::dropIfExists('discussed_item_issues');
    }
}

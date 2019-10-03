<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meeting_attendances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('meeting_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->boolean('is_attending');
            $table->string('general_note');
            $table->timestamps();

            $table->foreign('meeting_id')
                ->references('id')
                ->on('meetings')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('meeting_attendances');
    }
}

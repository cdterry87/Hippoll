<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollsChoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polls_choices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('poll_id')->unsigned();
            $table->foreign('poll_id')->references('id')->on('polls')->onDelete('cascade');
            $table->string('choice');
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
        Schema::dropIfExists('polls_choices');
    }
}

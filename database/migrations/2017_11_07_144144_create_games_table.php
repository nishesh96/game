<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('User_Score', function (Blueprint $table) {
                $table->increments('Game_ID');
                $table->integer('User_ID');
                $table->integer('Score_lv_1');
                $table->integer('Time_lv_1');
                $table->integer('Score_lv_2');
                $table->integer('Time_lv_2');
                $table->integer('Score_lv_3');
                $table->integer('Time_lv_3');
                $table->timestamps();

                $table->foreign('User_ID')->references('id')->on('users');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}

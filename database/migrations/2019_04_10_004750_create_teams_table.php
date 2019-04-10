<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('technician', 255)->nullable();
            $table->integer('qtd_yellow_cards')->nullable();
            $table->integer('qtd_red_cards')->nullable();
            $table->integer('position')->nullable();
            $table->integer('points')->nullable();
            $table->string('name', 255)->nullable();
            $table->string('initials', 255)->nullable();
            $table->string('shield_image', 1000)->nullable();
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
        Schema::dropIfExists('teams');
    }
}

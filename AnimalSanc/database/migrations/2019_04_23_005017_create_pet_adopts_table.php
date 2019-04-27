<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetAdoptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pet_adopts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pet_id');
            $table->forign('pet_id')->references('id')->on('pets');
            $table->integer('user_id');
            $table->forign('user_id')->references('id')->on('users');
            $table->boolean('adopted')->default(0);
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pet_adopts');
    }
}

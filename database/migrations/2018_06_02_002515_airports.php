<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Airports extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('airports', function(Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('name');
            $table->integer('front_pg')->default(0);
            $table->string('icao');
            $table->string('iata');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('airports');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZdolFinansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zdol_finans', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('id_przed')->nullable();
            $table->string('nazwa', 255)->nullable();
            $table->string('numer', 100)->nullable();
            $table->date('data_od')->nullable();
            $table->date('data_do')->nullable();
            $table->integer('ile_poj')->nullable();
            $table->string('suma_zab', 100)->nullable();
            $table->integer('status')->nullable();
            $table->text('uwagi')->nullable();
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
        Schema::dropIfExists('zdol_finans');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWykazPojTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wykaz_poj', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_przed')->nullable();
            $table->bigInteger('id_dok_przed')->nullable();
            $table->string('rodzaj_poj')->nullable();
            $table->string('marka')->nullable();
            $table->string('nr_rej')->nullable();
            $table->string('nr_vin')->nullable();
            $table->string('dmc')->nullable();
            $table->string('wlasnosc')->nullable();
            $table->date('data_wpr')->nullable();
            $table->date('data_wyc')->nullable();
            $table->integer('status', 2);
            $table->date('stan')->nullable();
            $table->timestamps('create_at');
            $table->timestamps('create_up');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wykaz_poj');
    }
}

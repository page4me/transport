<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBazaEkspTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baza_eksp', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('id_przed')->nullable();
            $table->string('rodzaj')->nullable();
            $table->string('adres')->nullable();
            $table->string('kod_p')->nullable();
            $table->string('miasto')->nullable();
            $table->string('gmina')->nullable();
            $table->string('wlasnosc')->nullable();
            $table->string('umowa')->nullable();
            $table->date('dat_umowy')->nullable();
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
        Schema::dropIfExists('baza_eksp');
    }
}

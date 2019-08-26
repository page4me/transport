<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrzedsiebiorcaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('przedsiebiorca', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('nazwa_firmy');
            $table->string('imie');
            $table->string('nazwisko');
            $table->string('adres');
            $table->string('miejscowosc');
            $table->string('kod_p');
            $table->string('gmina');
            $table->integer('nip')->default(0);
            $table->integer('regon')->default(0);
            $table->integer('telefon')->default(0);
            $table->string('email');
            $table->integer('status')->default(0);
            $table->longText('uwagi');
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
        Schema::dropIfExists('przedsiebiorca');
    }
}

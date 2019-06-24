<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKontroleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontrole', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_przed')->nullable();
            $table->string('nazwa')->nullable();
            $table->date('dat_zawiad')->nullable();
            $table->date('dat_roz')->nullable();
            $table->date('dat_zak')->nullable();
            $table->string('nr_upo')->nullable();
            $table->string('kto')->nullable();
            $table->string('wynik')->nullable();
            $table->string('zalecenia')->nullable();
            $table->date('dat_zal')->nullable();
            $table->string('wyn_pokont')->nullable();
            $table->date('dat_kol_kont')->nullable();
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
        Schema::dropIfExists('kontrole');
    }
}

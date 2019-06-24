<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDokPrzedWypTable extends Migration
{
    /**
     * Run the migrations.
     * dokumenty przedsiebiorcy - wypisy do licencji, zezwolenia, zaswiadczenia
     * @return void
     */
    public function up()
    {
        Schema::create('dok_przed_wyp', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_dok_przed')->nullable();
            $table->bigInteger('id_przed')->nullable();
            $table->string('nazwa')->nullable();
            $table->string('nr_wyp')->nullable();
            $table->string('nr_druku')->nullable();
            $table->string('nr_sprawy')->nullable();
            $table->date('data_wn')->nullable();
            $table->date('data_wyd')->nullable();
            $table->text('uwagi')->nullable();
            $table->timestamps('created_at');
            $table->timestamps('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dok_przed_wyp');
    }
}

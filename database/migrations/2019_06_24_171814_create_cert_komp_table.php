<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertKompTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cert_komp', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_przed')->nullable();
            $table->string('rodzaj')->nullable();
            $table->string('nr_cert')->nullable();
            $table->string('imie_os_z')->nullable();
            $table->string('nazwisko_os_z')->nullable();
            $table->string('adres')->nullable();
            $table->string('miasto')->nullable();
            $table->date('dat_ur')->nullable();
            $table->date('dat_wyd')->nullable();
            $table->string('os_zarz')->nullable();
            $table->string('umowa')->nullable();
            $table->date('dat_umowy')->nullable();
            $table->text('uwagi')->nullable();
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
        Schema::dropIfExists('cert_komp');
    }
}

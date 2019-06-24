<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRodzajPrzedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rodzaj_przed', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_przed')->nullable();
            $table->string('nazwa', 100)->nullable();
            $table->string('typ', 100)->nullable();
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
        Schema::dropIfExists('rodzaj_przed');
    }
}

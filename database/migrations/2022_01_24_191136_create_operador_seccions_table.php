<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperadorSeccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operador_seccions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_subseccion')->unsigned();
            $table->bigInteger('id_operador')->unsigned();
            $table->timestamps();

            $table->foreign('id_subseccion')->references('id')->on('subsecciones');
            $table->foreign('id_operador')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operador_seccions');
    }
}

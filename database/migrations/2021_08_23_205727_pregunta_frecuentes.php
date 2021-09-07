<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PreguntaFrecuentes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregunta_frecuentes', function (Blueprint $table) {
            $table->id();
            $table->string('pregunta', 500)->nullable();
            $table->string('respuesta', 3000 )->nullable();
            $table->integer('posicion')->default(0)->nullable();
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
        //
    }
}

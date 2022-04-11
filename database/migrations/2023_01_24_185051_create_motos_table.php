<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pedido')->unsigned();
            $table->bigInteger('id_cliente')->unsigned();
            $table->integer('rendido')->nullable();
            $table->string('fecha_envio');
            $table->integer('costo')->nullable();
            $table->integer('envio')->nullable();
            $table->string('observaciones');

            $table->timestamps();

            $table->foreign('id_pedido')->references('id')->on('facturas');
            $table->foreign('id_cliente')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('motos');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceReparacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_reparaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nro_serie');
            $table->string('fecha');
            $table->string('fecha_cierre');
            $table->bigInteger('id_consola')->unsigned();
            $table->bigInteger('id_estado')->unsigned();
            $table->string('total');
            $table->string('detalle', 300);
            $table->string('observaciones', 1000);
            $table->bigInteger('id_cliente')->unsigned();
            $table->bigInteger('id_operador')->unsigned();
            $table->string('impreso');
            $table->string('costo_mo');
            $table->string('costo_re');
            $table->timestamps();

            $table->foreign('id_consola')->references('id')->on('service_consolas');
            $table->foreign('id_estado')->references('id')->on('service_estados');
            $table->foreign('id_cliente')->references('id')->on('users');
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
        Schema::dropIfExists('service_reparaciones');
    }
}

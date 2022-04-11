<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevolucionesDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devoluciones_detalles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_devolucion')->unsigned();
            $table->bigInteger('id_producto')->unsigned();
            $table->Integer('cantidad')->unsigned();
            $table->string('motivo_devolucion');
            $table->Integer('id_forma_rma')->unsigned();
            $table->timestamps();

            $table->foreign('id_devolucion')->references('id')->on('devoluciones');
            $table->foreign('id_producto')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devoluciones_detalles');
    }
}

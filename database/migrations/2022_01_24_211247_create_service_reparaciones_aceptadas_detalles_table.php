<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceReparacionesAceptadasDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_reparaciones_aceptadas_detalles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_reparacion')->unsigned();
            $table->bigInteger('id_producto')->unsigned();
            $table->integer('cantidad');
            $table->integer('precio');
            $table->timestamps();

            $table->foreign('id_reparacion')->references('id')->on('service_reparaciones_aceptadas');
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
        Schema::dropIfExists('service_reparaciones_aceptadas_detalles');
    }
}

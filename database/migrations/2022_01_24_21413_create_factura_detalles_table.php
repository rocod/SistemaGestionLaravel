<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturaDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura_detalles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pedido')->unsigned();
            $table->bigInteger('id_producto')->unsigned();
            $table->Integer('cantidad');
            $table->Integer('precio');
            $table->Integer('costo');
            $table->timestamps();

            $table->foreign('id_pedido')->references('id')->on('pedidos');
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
        Schema::dropIfExists('factura_detalles');
    }
}

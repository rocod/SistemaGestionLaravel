<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosVariantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_variantes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_producto')->unsigned();
            $table->string('nombre');
            $table->integer('precio');
            $table->integer('precio_10');
            $table->integer('precio_50');
            $table->integer('precio_100');
            $table->timestamps();

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
        Schema::dropIfExists('productos_variantes');
    }
}

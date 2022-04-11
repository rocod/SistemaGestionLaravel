<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSerialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serials', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_producto')->unsigned();
            $table->integer('cantidad');
            $table->bigInteger('id_proveedor')->unsigned();
            $table->integer('seriales');
            $table->bigInteger('id_operador')->unsigned();
            $table->timestamps();

            $table->foreign('id_producto')->references('id')->on('productos');
            $table->foreign('id_proveedor')->references('id')->on('users');
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
        Schema::dropIfExists('serials');
    }
}

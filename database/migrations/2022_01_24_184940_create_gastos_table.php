<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastos', function (Blueprint $table) {
            $table->id();
            $table->string('fecha');
            $table->integer('monto');
            $table->text('observacion')->nullable();
            $table->bigInteger('id_concepto')->unsigned();
            $table->timestamps();

            $table->foreign('id_concepto')->references('id')->on('gasto_conceptos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gastos');
    }
}

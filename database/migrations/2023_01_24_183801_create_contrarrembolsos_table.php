<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContrarrembolsosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrarrembolsos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pedido')->unsigned()->default(0);
            $table->bigInteger('id_estado')->unsigned()->default(0);
            $table->timestamps();

            $table->foreign('id_pedido')->references('id')->on('pedidos');
            $table->foreign('id_estado')->references('id')->on('contrarrembolso_estados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrarrembolsos');
    }
}

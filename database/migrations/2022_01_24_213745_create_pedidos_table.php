<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('fecha');
            $table->bigInteger('id_cliente')->unsigned();
            $table->string('total');
            $table->string('ingreso_desde');
            $table->bigInteger('id_forma_pago')->unsigned();
            $table->bigInteger('id_forma_envio')->unsigned();
            $table->string('impreso');
            $table->string('franja_horaria');
            
            $table->bigInteger('id_estado')->unsigned();
            $table->bigInteger('id_operador')->unsigned();
            
            $table->string('observaciones');
                             
            $table->bigInteger('id_cuenta')->unsigned();
            
            $table->bigInteger('id_empresa_contrareembolso')->unsigned()->nullable();

            $table->timestamps();

            $table->foreign('id_cliente')->references('id')->on('users');
            $table->foreign('id_forma_pago')->references('id')->on('forma_pagos');
            $table->foreign('id_forma_envio')->references('id')->on('forma_envios');            
            $table->foreign('id_estado')->references('id')->on('pedidos_estados');
            $table->foreign('id_operador')->references('id')->on('users');
            $table->foreign('id_cuenta')->references('id')->on('cuentas');
            $table->foreign('id_empresa_contrareembolso')->references('id')->on('contrarrembolso_empresas');

         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContrarrembolsoEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrarrembolso_empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('telefono');
            $table->string('email');
            $table->string('direccion');
            $table->bigInteger('id_estado')->unsigned()->default(0);
            $table->timestamps();

            $table->foreign('id_estado')->references('id')->on('contrarrebolso_estados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrarrembolso_empresas');
    }
}

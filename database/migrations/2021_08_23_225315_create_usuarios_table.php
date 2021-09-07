<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('clave');
            $table->string('nombre');
            $table->string('dni');
            $table->string('telefono');
            $table->string('celular');
            $table->string('direccion');
            $table->string('cp');
            $table->string('localidad');
            $table->string('provincia');
            $table->string('tipo');
            $table->string('expreso');
            $table->string('usuario_me');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}

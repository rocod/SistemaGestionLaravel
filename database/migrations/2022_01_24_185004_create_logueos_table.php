<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogueosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logueos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_operador')->unsigned();
            $table->string('ip');
            $table->string('fecha');
            $table->timestamps();

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
        Schema::dropIfExists('logueos');
    }
}

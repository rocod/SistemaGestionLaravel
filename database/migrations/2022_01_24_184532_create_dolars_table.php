<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDolarsTable extends Migration
{
    /**
     * Run the migrations.
     *

     * @return void
     */
    public function up()
    {
        Schema::create('dolars', function (Blueprint $table) {
            $table->id();
            $table->string('pesos');
            $table->string('fecha');
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
        Schema::dropIfExists('dolars');
    }
}

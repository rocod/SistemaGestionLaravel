<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormuCamposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formu_campos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_clave');
            $table->string('nombre');
            $table->Integer('id_tipo');
            $table->Integer('orden');
            $table->Integer('estado');
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
        Schema::dropIfExists('formu_campos');
    }
}

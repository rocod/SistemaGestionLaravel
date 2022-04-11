<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormuSelectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formu_selects', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_campo')->unsigned();
            $table->string('opcion');
            $table->timestamps();

            $table->foreign('id_campo')->references('id')->on('formu_campos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formu_selects');
    }
}

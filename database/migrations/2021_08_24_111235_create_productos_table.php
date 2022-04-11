<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();            
            $table->bigInteger('categoria_id')->unsigned();
            $table->bigInteger('subcategoria_id')->unsigned()->nullable()->default(0);
            $table->bigInteger('subsubcategoria_id')->unsigned()->nullable()->default(0);
            $table->string('nombre', 300);
            $table->string('codigo');
            $table->string('precio')->nullable();
            $table->integer('costo')->nullable();
            $table->decimal('costo_dolar', $precision =10, $scale = 2)->nullable();
            $table->integer('precio_may')->nullable();
            $table->string('descripcion', 1500)->nullable();
            $table->string('imagen1', 500)->nullable();
            $table->string('imagen2', 500)->nullable();
            $table->string('imagen3', 500)->nullable();
            $table->string('imagen4', 500)->nullable();
            $table->string('video', 600)->nullable();
            $table->string('destacado', 10)->nullable();
            $table->bigInteger('producto_estado_id')->unsigned()->nullable()->default(0);
            $table->integer('precio_5')->nullable();
            $table->integer('precio_10')->nullable();
            $table->integer('precio_50')->nullable();
            $table->integer('stock')->nullable();
            $table->integer('stock_deposito')->nullable();
            $table->string('codigo_barras')->nullable();
            $table->string('precio_td')->nullable();
            $table->string('fecha_td')->nullable();
            $table->integer('secundario')->nullable();

            $table->timestamps();
            
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('subcategoria_id')->references('id')->on('subcategorias');
            $table->foreign('subsubcategoria_id')->references('id')->on('subsubcategorias');
            $table->foreign('producto_estado_id')->references('id')->on('productos_estados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}

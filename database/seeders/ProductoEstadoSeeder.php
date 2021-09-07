<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\producto_estado;

class ProductoEstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados=array('Stock', 'Sin Stock', 'Producto a Pedido del Cliente', 'Stock Entrante en Breve');
    	
    	foreach($estados as $estado){

	        $esta = new producto_estado();
	        $esta->estado = $estado;        
	        $esta->save();

    	}
    }
}

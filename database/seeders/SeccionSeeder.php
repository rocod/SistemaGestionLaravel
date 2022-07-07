<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seccion;

class SeccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $secciones=array('Productos', 'Secciones Web', 'Ventas', 'Usuarios', 'Service', 'Uso Externo');

        foreach($secciones as $secc){

            $seccion = new Seccion();           
            $seccion->nombre = $secc;           
            $seccion->save();
            
        }
    }
}

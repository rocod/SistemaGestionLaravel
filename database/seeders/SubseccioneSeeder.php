<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subseccione;

class SubseccioneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $subsecciones=array(
            array(1, 'Listado Productos', 'productos/panel_productos.php'),
            array(1, 'Carga múltiple productos', 'productos/carga_masiva_form.php'),
            array(1, 'Producto Destacado', 'producto_destacado/panel_productos.php'),
            array(1, 'Categorías', 'categorias_productos/categorias.php'),
            array(1, 'Stock', 'stock/panel.php'),
            array(2, 'Preg. Frecuentes', 'preguntas_frecuentes/panel.php'),
            array(2, 'Opiniones', 'opiniones/panel.php'),
            array(2, 'Home-slider', 'slider/panel.php'),
            array(2, 'Datos de Contacto', 'datos_contacto/panel.php'),
            array(2, 'Redes Sociales', 'redes_sociales/panel.php'),
            array(3, 'Ventas', 'ventas/panel.php'),
            array(3, 'Formas de Pago', 'formas_pago/panel.php'),
            array(3, 'Formas de Envio', 'formas_envio/panel.php'),
            array(3, 'Terminal Retiro', 'terminal_retiro/panel.php'),
            array(3, 'Depósito', 'depositos/panel.php'),
            array(3, 'Contrarrembolsos', 'contrareembolsos/panel.php'),
            array(3, 'Formas de RMA', 'formas_rma/panel.php'),
            array(3, 'Dolar', 'dolar/panel.php'),
            array(3, 'Costos', ''),
            array(4, 'Clientes', 'clientes/clientes.php'),
            array(4, 'Operadores', 'operadores/panel.php'),
            array(4, 'Proveedores', 'proveedores/panel.php'),
            array(5, 'Reparaciones', 'servicio_tecnico/panel.php'),
            array(5, 'Modelos de Consola', 'servicio_tecnico/modelos_consolas.php'),
            array(5, 'Estados de Reparacion', 'servicio_tecnico/estados_reparacion.php'),
            array(6, 'Formulario', 'formu/formulario.php'),
            array(6, 'Listado Formulario', 'usuarios_formu/listado.php'),
            array(6, 'NewsLetter', 'newsletter/panel.php'),
            array(6, 'Gastos', 'gastos/panel.php'),
            array(6, 'Exportar Suscripciones', 'suscripciones/panel.php'),
            array(6, 'Mailing', 'mailing/panel.php'),
            array(8, 'Clientes', ''),
            array(8, 'Stock', ''),
            array(8, 'RMA', ''),
            array(8, 'Faltantes', ''),
            array(8, 'Pagos', ''),
            array(8, 'Contrarrembolsos', ''),
            array(8, 'Motos', ''),
            array(8, 'Serial', ''),         
           


        );

        foreach($subsecciones as $sub){

            $subseccione = new Subseccione();
            $subseccione->seccion = $sub[0];
            $subseccione->nombre = $sub[1];
            $subseccione->link = $sub[2];
            $subseccione->save();

            /*
            DB::table('categorias')->insert([
            
                'categoria' => $cat,
            ]);*/
        }
        

       
    }
}

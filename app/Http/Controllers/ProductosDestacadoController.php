<?php

namespace App\Http\Controllers;

use App\Models\ProductosDestacado;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductosDestacadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productoDestacado(){

        $producto=0;
        $prodDest=ProductosDestacado::first();
        if($prodDest){
        
            $producto=Producto::findOrFail($prodDest->id_producto);
        }

        return view("productos.productos.productoDestacado")->with([
            'producto'=>$producto,           
            
        ]);
    }

    public function agregarDestacado($id){

        $prodDest=ProductosDestacado::first();
        if($prodDest)
        $prodDest->delete();

        $prod=new ProductosDestacado();
        $prod->id_producto=$id;
        $prod->save();

         return redirect("producto_destacado");

    }


}

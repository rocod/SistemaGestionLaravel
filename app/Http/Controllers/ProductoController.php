<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use App\Models\categoria;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        if(request()->input('busqueda')){

             $productos=Producto::when($buscador, function($query, $buscador){
                    return $query->where('productos.nombre','like', $buscador);
                })
                ->when($categoria, function($query, $categoria){
                    return $query->where('productos.categoria_id','<=', $categoria);
                })
                ->when($busqueda, function($query, $subcategoria){
                    return $query->where('productos.subcategoria_id', $subcategoria);
                })
                ->when($busqueda, function($query, $subsubcategoria){
                    return $query->where('productos.subsubcategoria_id', $subsubcategoria);
                })
                
                ->orderByDesc('productos.nombre')->paginate(30);  
        }else{
            $productos=Producto::orderByDesc('productos.nombre')->paginate(30); 

        }  

        return view("productos.productos.lista")->with([
            'productos'=>$productos,
            
        ]);
    }

    public function agregarForm(){

        $categorias= categoria::all();
        $proveedores=DB::table('proveedores')->get();
        $productos_estados=DB::table('productos_estados')->get();
       
        return view("productos.productos.agregarForm")->with([
            'categorias'=>$categorias,
            'proveedores'=>$proveedores,
            'estados'=>$productos_estados,            
        ]);
    }

    public function grabar(Request $request){
        $request->validate([
            'nombre' => 'required|max:300',
            'respuesta' => 'required|max:300',
            'posicion' => 'numeric'
        ]);

        Producto::create(request()->all());
        session()->flash('success', 'El producto se creó con éxito');
        return redirect("productos");
    }

    public function editarForm($id){

        $producto=Producto::findOrFail($id);
        
        return view("productos.productos.editarForm")->with([
            'producto'=>$producto,
            
        ]);
    }

    public function editar($id, Request $request){
        $request->validate([
            'producto' => 'required|max:300',
            'respuesta' => 'required|max:300',
            'posicion' => 'numeric'
        ]);

        $producto=Producto::findOrFail($id);
        $producto->update(request()->all());
        session()->flash('success', 'El producto se editó con éxito');
        return redirect("productos");
    }

    public function eliminarForm($id){

        $producto=Producto::findOrFail($id);
        

        return view("productos.productos.eliminarForm")->with([
            'producto'=>$producto,
            
        ]);
    }

    public function eliminar($id){
        $producto=Producto::findOrFail($id);
        $producto->delete();
        session()->flash('success', 'El producto se eliminó con éxito');
        return redirect("productos");

    }


}

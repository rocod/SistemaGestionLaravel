<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use App\Models\categoria;
use App\Models\subcategoria;
use App\Models\subsubcategoria;
use Intervention\Image\Facades\Image;

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
        $proveedores=DB::table('proveedors')->get();
        $productos_estados=DB::table('productos_estados')->get();
       
        return view("productos.productos.agregarForm")->with([
            'categorias'=>$categorias,
            'proveedores'=>$proveedores,
            'estados'=>$productos_estados,            
        ]);
    }

    public function grabar(Request $request){
       


        /*$request->validate([
            'nombre' => 'required|max:300',
            'respuesta' => 'required|max:300',
            'posicion' => 'numeric'
        ]);
        */

        $prod=Producto::create(request()->all());

       
        
       
        for($i=1; $i<=3; $i++){

        if(request()->file('imagen'.$i)){
                
                $image=request()->file('imagen'.$i);
                $nombre= time().'prod.'.$i.'.'.$image->getClientOriginalExtension();
                Image::make(request()->file('imagen'.$i))->fit(620, 465, function ($constraint) {
                    $constraint->upsize();
                    
                })->save('img/productos/'.$nombre);

                switch($i){
                    case 1:{
                        $prod->imagen1=$nombre;
                    }
                    break;
                    case 2:{
                        $prod->imagen2=$nombre;
                    }
                    break;
                    case 3:{
                        $prod->imagen3=$nombre;
                    }
                    break;
                }
                
                $prod->save();
                

            }
        }

        if(request()->file('imagen4')){

            $image = request()->file('imagen4');
            $nombre= time().'prod4.'.$image->getClientOriginalExtension();
            Image::make(request()->file('imagen4'))->fit(1200, 1200, function ($constraint) {
                $constraint->upsize();
            })->save('img/productos/'.$nombre);
            $prod->imagen4=$nombre;
            $prod->save();

        }

        session()->flash('success', 'El producto se creó con éxito');
        return redirect("productos");
    }

    public function agregarImgForm(){

        return view("productos.productos.agregarImagen");

    }

    public function grabarImagen(){

        if(request()->file('imagen1')){

            //dd('hola');

            $image = request()->file('imagen1');
            $nombre= time().'prod.'.$image->getClientOriginalExtension();
            Image::make(request()->file('imagen1'))->fit(1200, 1200, function ($constraint) {
                $constraint->upsize();
            })->save('img/productos/'.$nombre);

        }

        session()->flash('success', 'El producto se creó con éxito');
        return redirect("productos");
    }

    public function editarForm($id){

        $producto=Producto::findOrFail($id);

        $categorias= categoria::all();
        $proveedores=DB::table('proveedors')->get();
        $productos_estados=DB::table('productos_estados')->get();
       
        
        $subcategorias= subcategoria::where('relacion', $producto->categoria_id)->get();  
        

        $subsubcategorias=0;
        if($producto->subcategoria_id!=0){
          $subsubcategorias= subsubcategoria::where('relacion', $producto->subcategoria_id)->get();  
        }
        
        return view("productos.productos.editarForm")->with([
            'producto'=>$producto,
            'categorias'=>$categorias,
            'subcategorias'=>$subcategorias,
            'subsubcategorias'=>$subsubcategorias,
            'proveedores'=>$proveedores,
            'estados'=>$productos_estados, 
            
        ]);
    }

    public function editar($id, Request $request){
      /*  $request->validate([
            'producto' => 'required|max:300',
            'respuesta' => 'required|max:300',
            'posicion' => 'numeric'
        ]);*/


        $prod=Producto::findOrFail($id);
        $prod->update(request()->all());

       

        for($i=1; $i<=3; $i++){

        if(request()->file('imagene'.$i)){
                
                $image=request()->file('imagene'.$i);
                $nombre= time().'prod.'.$i.'.'.$image->getClientOriginalExtension();
                Image::make(request()->file('imagene'.$i))->fit(620, 465, function ($constraint) {
                    $constraint->upsize();
                    
                })->save('img/productos/'.$nombre);

                switch($i){
                    case 1:{
                        $prod->imagen1=$nombre;
                    }
                    break;
                    case 2:{
                        $prod->imagen2=$nombre;
                    }
                    break;
                    case 3:{
                        $prod->imagen3=$nombre;
                    }
                    break;
                }
                
                $prod->save();
                

            }
        }

        if(request()->file('imagene4')){

            $image = request()->file('imagene4');
            $nombre= time().'prod4.'.$image->getClientOriginalExtension();
            Image::make(request()->file('imagene4'))->fit(1200, 1200, function ($constraint) {
                $constraint->upsize();
            })->save('img/productos/'.$nombre);
            $prod->imagen4=$nombre;
            $prod->save();

        }

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

    public function Buscar(Request $request){


        if($request->ajax())
        {

          
        $output="<ul>";
        $busqueda='%'.$request->producto_destacado.'%';
        $productos=Producto::where('nombre', 'LIKE', $busqueda)
        ->orWhere('codigo', 'LIKE', $busqueda)
        ->orWhere('descripcion', 'LIKE', $busqueda)
        ->get();          
          
        if($productos)
        {
            foreach ($productos as $key => $producto){            
                

                $output.='<a href="agregarDestacado/'.$producto->id.'"><li>Cod:'.$producto->codigo.' | '.$producto->nombre.'</li></a>';              
            
            }
            
        }else{
            $output.="No hay resultados";
        }

        $output="</ul>";


            return Response($output);
        }

    }


}

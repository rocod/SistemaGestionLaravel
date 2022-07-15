<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\subcategoria;
use App\Models\subsubcategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($categoria=0, $subcategoria=0)
    {
        $categorias=categoria::orderBy('orden')->get();



        if($categoria==0){

            return view("Productos.categorias.lista")->with([
            'categorias'=>$categorias,
            ]);

        }elseif($subcategoria==0){

            


            $subcategorias=subcategoria::where('relacion', $categoria)->orderBy('orden')->get();
            $categoria=categoria::findOrFail($categoria);

           

           return view("Productos.categorias.lista")->with([
            'categorias'=>$categorias,
            'subcategorias'=>$subcategorias,
            'cat'=>$categoria,
            //'sub'=>$subcategoria,
            ]);

        }else{
            

            $subcategorias=subcategoria::where('relacion', $categoria)->orderBy('orden')->get();
            $subsubcategorias=subsubcategoria::where('relacion', $subcategoria)->orderBy('orden')->get();
            
            $categoria=categoria::findOrFail($categoria);
            $subcategoria=subcategoria::findOrFail($subcategoria);

            return view("Productos.categorias.lista")->with([
            'categorias'=>$categorias,
            'subcategorias'=>$subcategorias,
            'subsubcategorias'=>$subsubcategorias,
            'cat'=>$categoria,
            'sub'=>$subcategoria,
            ]);
        }
    }

    public function agregarForm(){
        return view("Productos.categorias.agregarForm");
    }
    public function grabar(){

        $pregunta=categoria::create(request()->all());
        session()->flash('success', 'La categoría se creó con éxito');
        return redirect("categorias");
    }

    public function editarForm($id){

        $categoria=categoria::findOrFail($id);
        
        return view("Productos.categorias.editarForm")->with([
            'categoria'=>$categoria,            
        ]);
    }
    public function editar($id){

        $categoria=categoria::findOrFail($id);
        $categoria->update(request()->all());

        session()->flash('success', 'La categoria se editó con éxito');
        return redirect("categorias");
    }


    public function eliminarForm($id){

        $categoria=categoria::findOrFail($id);        

        return view("Productos.categorias.eliminarForm")->with([
            'categoria'=>$categoria,            
        ]);
    }

    public function eliminar($id){

        $categoria=categoria::findOrFail($id);
        $subcategorias=subcategoria::where('relacion', $id)->get();

        if($subcategorias->count()==0){

            $categoria->delete();
            $mensaje="La categoría se eliminó con éxito";
            $tipo="success";

        }else{

            $mensaje="No se eliminó la categoría, porque ya tiene subcategorías relacionadas";
            $tipo="error";
        }
        

        session()->flash($tipo, $mensaje);
        return redirect("categorias")
        ;

    }

    
}

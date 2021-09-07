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
           return view("Productos.categorias.lista")->with([
            'categorias'=>$categorias,
            'subcategorias'=>$subcategorias,
            ]);

        }else{
             $subsubcategorias=subsubcategoria::where('relacion', $subcategoria)->orderBy('orden')->get();
            return view("Productos.categorias.lista")->with([
            'categorias'=>$categorias,
            'subcategorias'=>$subcategorias,
            'subsubcategorias'=>$subsubcategorias,
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

    
}

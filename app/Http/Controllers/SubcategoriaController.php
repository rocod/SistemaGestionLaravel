<?php

namespace App\Http\Controllers;

use App\Models\subcategoria;
use Illuminate\Http\Request;
use App\Models\categoria;
use App\Models\subsubcategoria;
use Illuminate\Support\Facades\DB;

class SubcategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function agregarSubForm($id_categoria){

        $categoria=categoria::findOrFail($id_categoria);
        return view("productos.categorias.agregarSubForm")->with([
            'categoria'=>$categoria,
            
        ]);

    }

     public function grabar($id_categoria){

        $subcategoria= new subcategoria();
        $subcategoria->opcion=request()->input('opcion');
        $subcategoria->orden=request()->input('orden');
        $subcategoria->relacion=$id_categoria;
        $subcategoria->save();
        session()->flash('success', 'La subcategoría se creó con éxito');
        return redirect("categorias/".$id_categoria);
    }


    public function editarForm($id, $id_categoria){

        $subcategoria=subcategoria::findOrFail($id);
        
        return view("Productos.categorias.editarSubForm")->with([
            'subcategoria'=>$subcategoria, 
            'id_categoria'=>$id_categoria,           
        ]);
    }

    public function editar($id, $id_categoria){

        $subcategoria=subcategoria::findOrFail($id);
        $subcategoria->update(request()->all());

        session()->flash('success', 'La subcategoria se editó con éxito');
        return redirect("categorias/".$id_categoria);
    }


    public function eliminarForm($id, $id_categoria){

        $subcategoria=subcategoria::findOrFail($id);        

        return view("Productos.categorias.eliminarSubForm")->with([
            'subcategoria'=>$subcategoria, 
            'id_categoria'=>$id_categoria,            
        ]);
    }

    public function eliminar($id, $id_categoria){

       
        $subcategoria=subcategoria::findOrFail($id);
        $subsubcategorias=subsubcategoria::where('relacion', $id)->get();        

        if($subsubcategorias->count()==0){

            $subcategoria->delete();
            $mensaje="La subcategoría se eliminó con éxito";
            $tipo="success";

        }else{


            $mensaje="No se eliminó la subcategoría, porque ya tiene subcategorías relacionadas";
            $tipo="error";
        }
        

        session()->flash($tipo, $mensaje);
        return redirect("categorias/".$id_categoria);

    }

   
    public function listar(Request $request){

        if($request->ajax())
        {

            
        $output="";
        $output.='<option value="">Seleccione</option>';
        $subcategorias=DB::table('subcategorias')          
            ->where('relacion',$request->categoria_id)->get();


        if($subcategorias)
        {
            foreach ($subcategorias as $key => $subcategoria) {
              
                if($request->producto_id){

                $output.='<option value="'.$subcategoria->id.'">'.$subcategoria->opcion.'</option>';

                }else{

                    $output.='<option value="'.$subcategoria->id.'">'.$subcategoria->opcion.'</option>';


                }
            
            }
            
            }
            return Response($output);
        }

    }


 
}

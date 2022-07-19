<?php

namespace App\Http\Controllers;

use App\Models\subsubcategoria;
use App\Models\subcategoria;
use App\Models\categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubsubcategoriaController extends Controller
{
    public function agregarForm($id_categoria, $id_subcategoria){

        $categoria=categoria::findOrFail($id_categoria);
        $subcategoria=subcategoria::findOrFail($id_subcategoria);
        return view("productos.categorias.agregarSubsubForm")->with([
            'categoria'=>$categoria,
            'subcategoria'=>$subcategoria,
            
        ]);

    }

     public function grabar($id_categoria, $id_subcategoria){

        $subsubcategoria= new subsubcategoria();
        $subsubcategoria->opcion=request()->input('opcion');
        $subsubcategoria->orden=request()->input('orden');
        $subsubcategoria->relacion=$id_subcategoria;
        $subsubcategoria->save();
        session()->flash('success', 'La subsubcategoría se creó con éxito');
        return redirect("categorias/".$id_categoria."/".$id_subcategoria);
    }

    public function editarForm($id, $id_categoria, $id_subcategoria){

        $subsubcategoria=subsubcategoria::findOrFail($id);
            
        return view("Productos.categorias.editarSubsubForm")->with([
            'subsubcategoria'=>$subsubcategoria, 
            'id_categoria'=>$id_categoria, 
            'id_subcategoria'=>$id_subcategoria,           
        ]);
    }

    public function editar($id, $id_categoria, $id_subcategoria){

        $subsubcategoria=subsubcategoria::findOrFail($id);
        $subsubcategoria->update(request()->all());

        session()->flash('success', 'La subsubcategoria se editó con éxito');
        return redirect("categorias/".$id_categoria."/".$id_subcategoria);
    }


    public function eliminarForm($id, $id_categoria, $id_subcategoria){

        $subsubcategoria=subsubcategoria::findOrFail($id);        

        return view("Productos.categorias.eliminarSubsubForm")->with([
            'subsubcategoria'=>$subsubcategoria, 
            'id_categoria'=>$id_categoria,       
            'id_subcategoria'=>$id_subcategoria,     
        ]);
    }

    public function eliminar($id, $id_categoria, $id_subcategoria){

       
        $subsubcategoria=subsubcategoria::findOrFail($id);
        $productos=Producto::where('subsubcategoria_id', $id)->get();        

        if($productos->count()==0){

            $subsubcategoria->delete();
            $mensaje="La subsubcategoría se eliminó con éxito";
            $tipo="success";

        }else{


            $mensaje="No se eliminó la subcategoría, porque ya tiene productos relacionados";
            $tipo="error";
        }
        
        session()->flash($tipo, $mensaje);
        return redirect("categorias/".$id_categoria."/".$id_subcategoria);

    }

    public function listar(Request $request){

        
        if($request->ajax())
        {

            
        $output="";
        $output.='<option value="">Seleccione</option>';
        $subsubcategorias=DB::table('subsubcategorias')          
            ->where('relacion',$request->subcategoria_id)->get();
            
        if($subsubcategorias)
        {
            foreach ($subsubcategorias as $key => $subsubcategoria) {
          
                if($request->producto_id){

                    $output.='<option value="'.$subsubcategoria->id.'">'.$subsubcategoria->opcion.'</option>';

                }else{

                    $output.='<option value="'.$subsubcategoria->id.'">'.$subsubcategoria->opcion.'</option>';

                }
                
            }
            
            }
            return Response($output);
        }

    }
}

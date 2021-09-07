<?php

namespace App\Http\Controllers;

use App\Models\opinione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OpinioneController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $preguntas=opinione::orderBy('id', 'desc')->get();
        

        return view("seccionesWeb.opiniones.lista")->with([
            'preguntas'=>$preguntas,
            
        ]);
    }

    public function agregarForm(){
        return view("seccionesWeb.opiniones.agregarForm");
    }
    public function grabar(){

        $pregunta=PreguntaFrecuente::create(request()->all());
        session()->flash('success', 'La pregunta se creó con éxito');
        return redirect("preguntas_frecuentes");
    }

    public function editarForm($id){

        $pregunta=PreguntaFrecuente::findOrFail($id);
        
        return view("seccionesWeb.opiniones.editarForm")->with([
            'pregunta'=>$pregunta,
            
        ]);
    }

    public function editar($id){

        $pregunta=PreguntaFrecuente::findOrFail($id);
        $pregunta->update(request()->all());
        session()->flash('success', 'La pregunta se editó con éxito');
        return redirect("preguntas_frecuentes");
    }

    public function eliminarForm($id){

        $pregunta=PreguntaFrecuente::findOrFail($id);
        

        return view("seccionesWeb.opiniones.eliminarForm")->with([
            'pregunta'=>$pregunta,
            
        ]);
    }

    public function eliminar($id){
        $pregunta=PreguntaFrecuente::findOrFail($id);
        $pregunta->delete();
        session()->flash('success', 'La pregunta se eliminó con éxito');
        return redirect("preguntas_frecuentes");

    }
}

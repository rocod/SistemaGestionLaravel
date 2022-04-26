<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PreguntaFrecuente;

class PreguntaFrecuenteController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

    	$preguntas=PreguntaFrecuente::orderBy('posicion')->get();    	

    	return view("seccionesWeb.preguntasFrecuentes.lista")->with([
            'preguntas'=>$preguntas,
            
        ]);
    }

    public function agregarForm(){
    	return view("seccionesWeb.preguntasFrecuentes.agregarForm");
    }
    public function grabar(Request $request){
        $request->validate([
            'pregunta' => 'required|max:300',
            'respuesta' => 'required|max:300',
            'posicion' => 'numeric'
        ]);

    	PreguntaFrecuente::create(request()->all());
    	session()->flash('success', 'La pregunta se creó con éxito');
    	return redirect("preguntas_frecuentes");
    }

    public function editarForm($id){

    	$pregunta=PreguntaFrecuente::findOrFail($id);
    	
    	return view("seccionesWeb.preguntasFrecuentes.editarForm")->with([
            'pregunta'=>$pregunta,
            
        ]);
    }

    public function editar($id, Request $request){
        $request->validate([
            'pregunta' => 'required|max:300',
            'respuesta' => 'required|max:300',
            'posicion' => 'numeric'
        ]);

    	$pregunta=PreguntaFrecuente::findOrFail($id);
    	$pregunta->update(request()->all());
    	session()->flash('success', 'La pregunta se editó con éxito');
    	return redirect("preguntas_frecuentes");
    }

    public function eliminarForm($id){

    	$pregunta=PreguntaFrecuente::findOrFail($id);
    	

    	return view("seccionesWeb.preguntasFrecuentes.eliminarForm")->with([
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

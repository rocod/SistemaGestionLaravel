<?php

namespace App\Http\Controllers;

use App\Models\Opinione;
use Illuminate\Http\Request;

class OpinioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opiniones=Opinione::all();       

        return view("seccionesWeb.opiniones.lista")->with([
            'opiniones'=>$opiniones,
            
        ]);
    }

 

    public function editar($id){

        $opinion=Opinione::findOrFail($id);
        $opinion->update(request()->all());
        session()->flash('success', 'Se actualizó el estado de la opinión');
        return redirect("opiniones");
    }



    
}

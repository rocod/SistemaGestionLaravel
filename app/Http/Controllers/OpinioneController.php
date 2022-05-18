<?php

namespace App\Http\Controllers;

use App\Models\Opinione;
use Illuminate\Http\Request;

class OpinioneController extends Controller
{
    public function index()
    {
        $opiniones = Opinione::latest()->get();

        return view('seccionesWeb.opiniones.index', compact('opiniones'));
    }

    public function create()
    {
        return view('seccionesWeb.opiniones.agregarOpinion');
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto' => 'required',
            'puntaje'  => 'required|numeric',
            'opinion'  => 'required|max:500',
        ]);

        Opinione::create(['id_usuario' => auth()->user()->id] + $request->all());

        session()->flash('success', 'La opinión se creó con éxito');

        return redirect('opiniones');
    }

    public function aceptar(Opinione $opinion)
    {
        $opinion->update(['estado' => 'Aceptado']);
        
        session()->flash('success', 'El estado de la opinión se modifico con éxito');

        return redirect('opiniones');
    }

    public function rechazar(Opinione $opinion)
    {
        $opinion->update(['estado' => 'Rechazado']);
        
        session()->flash('success', 'El estado de la opinión se modifico con éxito');

        return redirect('opiniones');
    }
}

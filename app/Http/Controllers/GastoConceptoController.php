<?php

namespace App\Http\Controllers;

use App\Models\GastoConcepto;
use Illuminate\Http\Request;

class GastoConceptoController extends Controller
{
    public function index()
    {
        $conceptos = GastoConcepto::where('estado', 1)->get();

        return view('usoExterno.conceptos.index', compact('conceptos'));
    }

    public function create()
    {
        return view('usoExterno.conceptos.agregarConcepto');
    }

    public function store(Request $request)
    {
        $request->validate(['concepto' => 'required|max:30']);

        GastoConcepto::create(['estado' => 1] + $request->all());

        session()->flash('success', 'El concepto se creó con éxito');

        return redirect('conceptos');
    }

    public function edit(GastoConcepto $concepto)
    {
        return view('usoExterno.conceptos.editarConceptoForm', compact('concepto'));
    }

    public function update(Request $request, GastoConcepto $concepto)
    {
        $request->validate(['concepto' => 'required|max:30']);
        
        $concepto->update($request->all());

        session()->flash('success', 'El concepto se editó con éxito');

        return redirect('conceptos');
    }

    public function eliminarForm(GastoConcepto $concepto)
    {
        return view('usoExterno.conceptos.eliminarConceptoForm', compact('concepto'));
    }


    public function destroy(GastoConcepto $concepto)
    {
        $concepto->update(['estado' => 0]);
        
        session()->flash('success', 'El concepto se eliminó con éxito');

        return redirect('conceptos');
    }
}

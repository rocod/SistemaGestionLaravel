<?php

namespace App\Http\Controllers;

use App\Models\ServiceEstado;
use Illuminate\Http\Request;

class ServiceEstadoController extends Controller
{
    public function index()
    {
        $estados_reparacion = ServiceEstado::all();

        return view('servicee.estados.index', compact('estados_reparacion'));
    }

    public function create()
    {
        return view('servicee.estados.agregarEstadoReparacion');
    }

    public function store(Request $request)
    {
        $request->validate([
            'estado'  => 'required|max:30',
            'mensaje' => 'max:500'
        ]);

        ServiceEstado::create(['estado' => strtoupper($request->estado)] + $request->all());

        session()->flash('success', 'El estado de reparación se creó con éxito');

        return redirect('estados_reparacion');
    }

    public function edit(ServiceEstado $estado_reparacion)
    {
        return view('servicee.estados.editarEstadoReparacionForm', compact('estado_reparacion'));
    }

    public function update(Request $request, ServiceEstado $estado_reparacion)
    {
        $request->validate([
            'estado'  => 'required|max:30',
            'mensaje' => 'max:500'
        ]);
        
        $estado_reparacion->update(['estado' => strtoupper($request->estado)] + $request->all());

        session()->flash('success', 'El estado de reparación se editó con éxito');

        return redirect('estados_reparacion');
    }

    public function eliminarForm(ServiceEstado $estado_reparacion)
    {
        return view('servicee.estados.eliminarEstadoReparacionForm', compact('estado_reparacion'));
    }


    public function destroy(ServiceEstado $estado_reparacion)
    {
        $estado_reparacion->delete();
        
        session()->flash('success', 'El estado de reparación se eliminó con éxito');

        return redirect('estados_reparacion');
    }
}

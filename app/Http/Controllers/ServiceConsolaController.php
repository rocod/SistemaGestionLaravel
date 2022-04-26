<?php

namespace App\Http\Controllers;

use App\Models\ServiceConsola;
use Illuminate\Http\Request;

class ServiceConsolaController extends Controller
{
    public function index()
    {
        $consolas = ServiceConsola::all();

        return view('servicee.consolas.index', compact('consolas'));
    }

    public function create()
    {
        return view('servicee.consolas.agregarConsola');
    }

    public function store(Request $request)
    {
        $request->validate(['consola' => 'required|max:30']);

        ServiceConsola::create($request->all());

        session()->flash('success', 'La consola se creó con éxito');

        return redirect('modelos_consolas');
    }

    public function edit(ServiceConsola $consola)
    {
        return view('servicee.consolas.editarConsolaForm', compact('consola'));
    }

    public function update(Request $request, ServiceConsola $consola)
    {
        $request->validate(['consola' => 'required|max:30']);
        
        $consola->update($request->all());

        session()->flash('success', 'La consola se editó con éxito');

        return redirect('modelos_consolas');
    }

    public function eliminarForm(ServiceConsola $consola)
    {
        return view('servicee.consolas.eliminarConsolaForm', compact('consola'));
    }

    public function destroy(ServiceConsola $consola)
    {
        $consola->delete();

        session()->flash('success', 'La consola se eliminó con éxito');

        return redirect('modelos_consolas');
    }
}

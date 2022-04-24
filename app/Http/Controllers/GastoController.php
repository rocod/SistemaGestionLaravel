<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use Illuminate\Http\Request;

class GastoController extends Controller
{
    public function index()
    {
        $gastos = Gasto::all();

        return view('usoExterno.gastos.index', compact('gastos'));
    }

    public function create()
    {
        return view('usoExterno.gastos.agregarGasto');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required',
            'monto' => 'required',
            'id_concepto' => 'required',
        ]);

        Gasto::create($request->all());

        session()->flash('success', 'El gasto se creó con éxito');

        return redirect('gastos');
    }

    public function edit(Gasto $gasto)
    {
        return view('usoExterno.gastos.editarGastoForm', compact('gasto'));
    }

    public function update(Request $request, Gasto $gasto)
    {
        $request->validate([
            'fecha' => 'required',
            'monto' => 'required',
            'id_concepto' => 'required',
        ]);
        
        $gasto->update($request->all());

        session()->flash('success', 'El gasto se editó con éxito');

        return redirect('gastos');
    }

    public function eliminarForm(Gasto $gasto)
    {
        return view('usoExterno.gastos.eliminarGastoForm', compact('gasto'));
    }


    public function destroy(Gasto $gasto)
    {
        $gasto->delete();
        
        session()->flash('success', 'El gasto se eliminó con éxito');

        return redirect('gastos');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use Illuminate\Http\Request;

class CuentaController extends Controller
{
    public function index()
    {
        $depositos = Cuenta::where('estado', 1)->get();

        return view('ventas.depositos.index', compact('depositos'));
    }

    public function create()
    {
        return view('ventas.depositos.agregarDeposito');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'      => 'required|max:40',
            'nro_cuenta'  => 'required|numeric',
            'cbu'         => 'required|numeric',
            'banco'       => 'required|max:100',
            'titular'     => 'required|max:150'
        ]);

        Cuenta::create(['estado' => 1] + $request->all());

        session()->flash('success', 'El depósito se creó con éxito');

        return redirect('depositos');
    }

    public function edit(Cuenta $deposito)
    {
        return view('ventas.depositos.editarDepositoForm', compact('deposito'));
    }

    public function update(Request $request, Cuenta $deposito)
    {
        $request->validate([
            'nombre'      => 'required|max:40',
            'nro_cuenta'  => 'required|numeric',
            'cbu'         => 'required|numeric',
            'banco'       => 'required|max:100',
            'titular'     => 'required|max:150'
        ]);

        $deposito->update($request->all());

        session()->flash('success', 'El depósito se editó con éxito');

        return redirect('depositos');
    }

    public function eliminarForm(Cuenta $deposito)
    {
        return view('ventas.depositos.eliminarDepositoForm', compact('deposito'));
    }

    public function destroy(Cuenta $deposito)
    {
        $deposito->update(['estado' => 0]);

        session()->flash('success', 'El depósito se eliminó con éxito');

        return redirect('depositos');
    }
}

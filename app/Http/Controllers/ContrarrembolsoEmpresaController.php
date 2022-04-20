<?php

namespace App\Http\Controllers;

use App\Models\contrarrembolso_empresa;
use Illuminate\Http\Request;

class ContrarrembolsoEmpresaController extends Controller
{
    public function index()
    {
        $contrareembolsos = contrarrembolso_empresa::where('estado', 1)->get();

        return view('ventas.contrareembolso.index', ['contrareembolsos' => $contrareembolsos]);
    }

    public function create()
    {
        return view('ventas.contrareembolso.agregarContrareembolso');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ]);

        contrarrembolso_empresa::create($request->all());

        session()->flash('success', 'El contrareembolso se creó con éxito');

        return redirect('contrareembolsos');
    }

    public function edit(contrarrembolso_empresa $contrarrembolso_empresa)
    {
        return view('ventas.contrareembolso.editarContrareembolsoForm', ['contrarrembolso_empresa' => $contrarrembolso_empresa]);
    }

    public function update(Request $request, contrarrembolso_empresa $contrarrembolso_empresa)
    {
        $request->validate([
            'nombre' => 'required'
        ]);

        $contrarrembolso_empresa->update($request->all());

        session()->flash('success', 'El contrareembolso se editó con éxito');
        
        return redirect('contrareembolsos');
    }

    public function eliminarForm(contrarrembolso_empresa $contrarrembolso_empresa)
    {
        return view('ventas.contrareembolso.eliminarContrareembolsoForm', compact('contrarrembolso_empresa'));
    }


    public function destroy(contrarrembolso_empresa $contrarrembolso_empresa)
    {
        $contrarrembolso_empresa->update(['estado' => 0]);

        session()->flash('success', 'El contrareembolso se eliminó con éxito');

        return redirect('contrareembolsos');
    }
}

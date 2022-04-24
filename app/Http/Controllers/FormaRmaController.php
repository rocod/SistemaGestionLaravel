<?php

namespace App\Http\Controllers;

use App\Models\FormaRma;
use Illuminate\Http\Request;

class FormaRmaController extends Controller
{
    public function index()
    {
        $formas_rma = FormaRma::where('estado', 1)->get();

        return view('ventas.formasRMA.index', compact('formas_rma'));
    }

    public function create()
    {
        return view('ventas.formasRMA.agregarFormaRMA');
    }

    public function store(Request $request)
    {
        $request->validate(['forma_rma' => 'required']);

        FormaRma::create(['estado' => 1] + $request->all());

        session()->flash('success', 'La forma de RMA se creó con éxito');

        return redirect('formas_rma');
    }

    public function edit(FormaRma $forma_rma)
    {
        return view('ventas.formasRMA.editarFormaRMAForm', compact('forma_rma'));
    }

    public function update(Request $request, FormaRma $forma_rma)
    {
        $request->validate(['forma_rma' => 'required']);
        
        $forma_rma->update($request->all());

        session()->flash('success', 'La forma de RMA se editó con éxito');

        return redirect('formas_rma');
    }

    public function eliminarForm(FormaRma $forma_rma)
    {
        return view('ventas.formasRMA.eliminarFormaRMAForm', compact('forma_rma'));
    }


    public function destroy(FormaRma $forma_rma)
    {
        $forma_rma->update(['estado' => 0]);
        
        session()->flash('success', 'La forma de RMA se eliminó con éxito');

        return redirect('formas_rma');
    }
}

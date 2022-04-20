<?php

namespace App\Http\Controllers;

use App\Models\FormaPago;
use Illuminate\Http\Request;

class FormaPagoController extends Controller
{
    public function index()
    {
        $formas_de_pago = FormaPago::where('estado', 1)->get();

        return view('ventas.formasDePago.index', ['formas_de_pago' => $formas_de_pago]);
    }

    public function create()
    {
        return view('ventas.formasDePago.agregarFormaDePago');
    }

    public function store(Request $request)
    {
        $request->validate(['forma_pago' => 'required']);

        FormaPago::create(['estado' => 1] + $request->all());

        session()->flash('success', 'La forma de pago se creó con éxito');

        return redirect('formas_de_pago');
    }

    public function edit(FormaPago $forma_de_pago)
    {
        return view('ventas.formasDePago.editarFormaDePagoForm', ['forma_de_pago' => $forma_de_pago]);
    }

    public function update(Request $request, FormaPago $forma_de_pago)
    {
        $request->validate(['forma_pago' => 'required']);

        $forma_de_pago->update($request->all());

        session()->flash('success', 'La forma de pago se editó con éxito');

        return redirect('formas_de_pago');
    }

    public function eliminarForm(FormaPago $forma_de_pago)
    {
        return view('ventas.formasDePago.eliminarFormaDePagoForm', compact('forma_de_pago'));
    }

    public function destroy(FormaPago $forma_de_pago)
    {
        $forma_de_pago->update(['estado' => 0]);

        session()->flash('success', 'La forma de pago se eliminó con éxito');

        return redirect('formas_de_pago');
    }
}

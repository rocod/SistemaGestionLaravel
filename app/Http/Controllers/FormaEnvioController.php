<?php

namespace App\Http\Controllers;

use App\Models\FormaEnvio;
use Illuminate\Http\Request;

class FormaEnvioController extends Controller
{
    public function index()
    {
        $formas_de_envio = FormaEnvio::where('estado', 1)->get();

        return view('ventas.formasDeEnvio.index', ['formas_de_envio' => $formas_de_envio]);
    }

    public function create()
    {
        return view('ventas.formasDeEnvio.agregarFormaDeEnvio');
    }

    public function store(Request $request)
    {
        $request->validate(['forma_envio' => 'required']);

        FormaEnvio::create(['estado' => 1] + $request->all());

        session()->flash('success', 'La forma de pago se creó con éxito');

        return redirect('formas_de_envio');
    }

    public function edit(FormaEnvio $forma_de_envio)
    {
        return view('ventas.formasDeEnvio.editarFormaDeEnvioForm', ['forma_de_envio' => $forma_de_envio]);
    }

    public function update(Request $request, FormaEnvio $forma_de_envio)
    {
        $request->validate(['forma_envio' => 'required']);
        
        $forma_de_envio->update($request->all());

        session()->flash('success', 'La forma de envío se editó con éxito');

        return redirect('formas_de_envio');
    }

    public function destroy(FormaEnvio $forma_de_envio)
    {
        $forma_de_envio->update(['estado' => 0]);

        session()->flash('success', 'La forma de envío se eliminó con éxito');

        return back();
    }
}

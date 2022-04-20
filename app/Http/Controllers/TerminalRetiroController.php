<?php

namespace App\Http\Controllers;

use App\Models\TerminalRetiro;
use Illuminate\Http\Request;

class TerminalRetiroController extends Controller
{
    public function index()
    {
        $terminales_retiro = TerminalRetiro::where('estado', 1)->get();

        return view('ventas.terminalRetiro.index', ['terminales_retiro' => $terminales_retiro]);
    }

    public function create()
    {
        return view('ventas.terminalRetiro.agregarTerminalRetiro');
    }

    public function store(Request $request)
    {
        $request->validate(['nombre' => 'required']);

        TerminalRetiro::create(['estado' => 1] + $request->all());

        session()->flash('success', 'La termianl de Retiro se creó con éxito');

        return redirect('terminal_retiro');
    }

    public function edit(TerminalRetiro $terminal_retiro)
    {
        return view('ventas.terminalRetiro.editarTerminalRetiroForm', ['terminal_retiro' => $terminal_retiro]);
    }

    public function update(Request $request, TerminalRetiro $terminal_retiro)
    {
        $request->validate(['nombre' => 'required']);
        
        $terminal_retiro->update($request->all());

        session()->flash('success', 'La terminal de Retiro se editó con éxito');

        return redirect('terminal_retiro');
    }

    public function eliminarForm(TerminalRetiro $terminal_retiro)
    {
        return view('ventas.formasDePago.eliminarFormaDePagoForm', compact('terminal_retiro'));
    }

    public function destroy(TerminalRetiro $terminal_retiro)
    {
        $terminal_retiro->update(['estado' => 0]);

        session()->flash('success', 'La terminal de Retiro se eliminó con éxito');

        return redirect('terminal_retiro');
    }
}

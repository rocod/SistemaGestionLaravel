<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use App\Models\GastoConcepto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GastoController extends Controller
{
    public function index(Request $request)
    {
        $query_one = $request->get('search_one');
        $query_two = $request->get('search_two');
        $query = $request->get('search');

        $gastos = Gasto::where('id_concepto', 'LIKE', '%' . $query . '%')
            ->orWhereBetween('fecha', [$query_one, $query_two])
            ->orderBy('fecha', 'desc')
            ->get();

        $conceptos = GastoConcepto::all();

        return view('usoExterno.gastos.index', compact('gastos', 'query_one', 'query_two', 'query', 'conceptos'));
    }

    public function create()
    {
        $conceptos = GastoConcepto::where('estado', 1)->get();

        return view('usoExterno.gastos.agregarGasto', compact('conceptos'));
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
        $conceptos = GastoConcepto::where('estado', 1)->get();

        return view('usoExterno.gastos.editarGastoForm', compact('gasto', 'conceptos'));
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

    public function buscador(Request $request)
    {
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');

        $query = DB::table('gastos')->select()
            ->where('fecha', '>=', $fromDate)
            ->where('fecha', '<=', $toDate)
            ->get();
        // dd($query);

        $gastos = Gasto::latest()->get();

        return view('usoExterno.gastos.index', compact('query', 'gastos'));
    }
}

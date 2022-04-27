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
        $conceptos = GastoConcepto::all();
        
        $fecha_desde = request()->input('search_one');      
        $fecha_hasta = request()->input('search_two');
        $busqueda = request()->input('search');

        if ($fecha_desde > $fecha_hasta) {
            session()->flash('success', 'La fecha "desde" debe ser menor a la fecha "hasta"');

            $gastos = Gasto::orderBy('fecha', 'desc')->get();
        
        } else {
        
            $gastos = Gasto::orderBy('fecha', 'desc')
                ->when($fecha_desde, function($query, $fecha_desde){
                    return $query->whereDate('fecha', '>=', $fecha_desde);
                })
                ->when($fecha_hasta, function($query, $fecha_hasta){
                    return $query->whereDate('fecha', '<=', $fecha_hasta);
                })
                ->when($busqueda, function($query, $busqueda){
                    return $query->where('id_concepto', $busqueda);
                })
                ->get();


        }//fin del else

        return view('usoExterno.gastos.index', compact('gastos', 'fecha_desde', 'fecha_hasta', 'busqueda', 'conceptos'));
    }

    public function create()
    {
        $conceptos = GastoConcepto::where('estado', 1)->get();

        return view('usoExterno.gastos.agregarGasto', compact('conceptos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'monto' => 'required|numeric',
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
            'fecha' => 'required|date',
            'monto' => 'required|numeric',
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

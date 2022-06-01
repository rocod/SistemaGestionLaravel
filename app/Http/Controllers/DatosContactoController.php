<?php

namespace App\Http\Controllers;

use App\Models\DatosContacto;
use Illuminate\Http\Request;

class DatosContactoController extends Controller
{
    public function index()
    {
        $dato1 = DatosContacto::where('id', 1)->get();
        $dato2 = DatosContacto::where('id', 2)->get();
        $dato3 = DatosContacto::where('id', 3)->get();

        return view('seccionesWeb.datosDeContacto.index', compact('dato1', 'dato2', 'dato3'));
    }

    public function edit(DatosContacto $dato)
    {
        return view('seccionesWeb.datosDeContacto.editarDatoDeContactoForm', compact('dato'));
    }

    public function update(Request $request, DatosContacto $dato)
    {
        $request->validate([
            'linea1' => 'required|max:200',
            'linea2' => 'required|max:200',
        ]);

        $dato->update($request->all());

        return redirect('datos_de_contacto');
    }

}

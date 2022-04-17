<?php

namespace App\Http\Controllers;

use App\Models\RedesSociales;
use Illuminate\Http\Request;

class RedesSocialesController extends Controller
{
    public function index()
    {
        $redes_sociales = RedesSociales::all();

        return view('seccionesWeb.redesSociales.index', ['redes_sociales' => $redes_sociales]);
    }

    public function create()
    {
        return view('seccionesWeb.redesSociales.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'    => 'required',
            'direccion' => 'required'
        ]);

        RedesSociales::create($request->all());

        return redirect('redes_sociales');
    }

    public function edit(RedesSociales $red_social)
    {
        return view('seccionesWeb.redesSociales.edit', ['red_social' => $red_social]);
    }

    public function update(Request $request, RedesSociales $red_social)
    {
        $request->validate([
            'nombre'    => 'required',
            'direccion' => 'required'
        ]);

        $red_social->update($request->all());

        return redirect('redes_sociales');
    }

    public function destroy(RedesSociales $redesSociales)
    {
        //
    }
}

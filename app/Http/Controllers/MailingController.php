<?php

namespace App\Http\Controllers;

use App\Models\Mailing;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class MailingController extends Controller
{
    public function index()
    {
        $mailings = Mailing::orderBy('posicion', 'asc')->get();

        return view('usoExterno.mailing.index', ['mailings' => $mailings]);
    }

    public function create()
    {
        return view('usoExterno.mailing.agregarMailing');
    }

    public function store(Request $request)
    {
        $request->validate([
            'asunto'          => 'required|max:150',
            'cuerpo'          => 'required|max:600',
            'archivo_adjunto' => 'required',
            'posicion'        => 'numeric|required',
        ]);

        $imagen = $request->file('archivo_adjunto')->store('public/images');
        $url = Storage::url($imagen);

        Mailing::create(['archivo_adjunto' => $url] + $request->all());

        session()->flash('success', 'El mailing se creó con éxito');

        return redirect('mailing');
    }

    public function edit(Mailing $mailing)
    {
        return view('usoExterno.mailing.editarMailingForm', ['mailing' => $mailing]);
    }

    public function update(Request $request, Mailing $mailing)
    {
        $request->validate([
            'asunto'          => 'required|max:150',
            'cuerpo'          => 'required|max:600',
            'archivo_adjunto' => 'required',
            'posicion'        => 'numeric|required',
        ]);
        
        /*Eliminar imagen anterior*/ 
        $url = str_replace('storage', 'public', $mailing->archivo_adjunto);
        Storage::delete($url);
        /*Agregar imagen nueva*/
        $imagen = $request->file('archivo_adjunto')->store('public/images');
        $url = Storage::url($imagen);

        $mailing->update(['archivo_adjunto' => $url] + $request->all());

        session()->flash('success', 'El mailing se editó con éxito');

        return redirect('mailing');
    }

    public function eliminarForm(Mailing $mailing)
    {
        return view('usoExterno.mailing.eliminarMailingForm', compact('mailing'));
    }

    public function destroy(Mailing $mailing)
    {
        /*borrar imagen de la carpeta storage*/ 
        $url = str_replace('storage', 'public', $mailing->archivo_adjunto);
        Storage::delete($url);

        $mailing->delete();

        session()->flash('success', 'El mailing se eliminó con éxito');

        return redirect('mailing');
    }
}

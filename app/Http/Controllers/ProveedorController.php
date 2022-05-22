<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::latest()->get();

        return view('usuarios.proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        return view('usuarios.proveedores.agregarProveedor');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'   => 'required|max:100',
            'cuit'        => 'max:100',
            'email'       => 'email|max:150',
            'telefono'    => 'max:150',
            'direccion'   => 'max:200',
            'informacion' => 'max:250',
        ]);

        Proveedor::create($request->all());

        session()->flash('success', 'El proveedor se creó con éxito');

        return redirect('proveedores');
    }

    public function edit(Proveedor $proveedor)
    {
        return view('usuarios.proveedores.editarProveedorForm', compact('proveedor'));
    }

    public function update(Request $request, Proveedor $proveedor)
    {
        $request->validate([
            'nombre'   => 'required|max:100',
            'cuit'        => 'max:100',
            'email'       => 'email|max:150',
            'telefono'    => 'max:150',
            'direccion'   => 'max:200',
            'informacion' => 'max:250',
        ]);
        
        $proveedor->update($request->all());

        session()->flash('success', 'El proveedor se editó con éxito');

        return redirect('proveedores');
    }

    public function eliminarForm(Proveedor $proveedor)
    {
        return view('usuarios.proveedores.eliminarProveedorForm', compact('proveedor'));
    }

    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();

        session()->flash('success', 'El proveedor se eliminó con éxito');

        return redirect('proveedores');
    }
}

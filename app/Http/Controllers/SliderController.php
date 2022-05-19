<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();

        return view('seccionesWeb.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('seccionesWeb.slider.agregarSlider');
    }

    public function store(Request $request)
    {
        $request->validate([
            'imagen' => 'required|image'
        ]);

        $imagen = $request->file('imagen')->store('public/images/sliders');
        $url = Storage::url($imagen);

        Slider::create(['imagen' => $url] + $request->all());

        session()->flash('success', 'El Slider se creó con éxito');

        return redirect('slider');
    }

    public function eliminarForm(Slider $slider)
    {
        return view('seccionesWeb.slider.eliminarSliderForm', compact('slider'));
    }

    public function destroy(Slider $slider)
    {
        /*borrar imagen de la carpeta storage*/ 
        $url = str_replace('storage', 'public', $slider->imagen);
        Storage::delete($url);

        $slider->delete();

        session()->flash('success', 'El Slider se eliminó con éxito');

        return redirect('slider');
    }
}

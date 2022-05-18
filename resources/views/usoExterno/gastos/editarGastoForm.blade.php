@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Gastos</h1>

                    </div>
                    <div class="row">
                        <div class="col">
                            <h3 class="text-primary">Editar</h3>
                        </div>
                        
                    </div>

                    <div class="row">

                        <div class="col-md-6 offset-md-3">
                            <form method="POST" action="{{ route('editarGasto' , $gasto) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="fecha" class="form-label">Fecha</label>
                                    <input name="fecha" type="date" class="form-control" id="fecha" aria-describedby="fecha" required value="{{ old('fecha', $gasto->fecha) }}">
                                </div>
                                <div class="form-group">
                                    <label for="monto" class="form-label">Monto</label>
                                    <input name="monto" type="text" class="form-control" id="monto" aria-describedby="monto" value="{{ old('monto', $gasto->monto) }}">
                                </div>
                                <div class="form-group">
                                    <p>Concepto de este gasto: {{ $gasto->concepto->concepto }}</p>
                                    <p>Volver a selecionar concepto:</p>
                                    <select name="id_concepto">
                                        @foreach ($conceptos as $concepto)
                                            <option class="form-control" value="{{ $concepto->id }}">{{ $concepto->concepto }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="observacion" class="form-label">Observaciones</label>
                                    <textarea name="observacion" class="form-control" id="observacion" aria-describedby="observacion" cols="30" rows="6">{{ old('observacion', $gasto->observacion) }}</textarea>
                                </div>
                                <p class="text-danger">Antes de modificar vuelva a seleccionar el concepto que corresponda a este gasto</p>
                                <button type="submit" class="btn btn-primary mb-4" title="grabar" onclick="confirm('¿Esta seguro que selecciono el concepto correspondiente a este gasto?')">Modificar</button>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
@endsection

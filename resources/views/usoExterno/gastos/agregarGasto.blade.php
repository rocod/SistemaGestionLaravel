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
                            <h3 class="text-primary">Agregar gasto</h3>
                        </div>
                        
                    </div>

                    <div class="row">

                        <div class="col-md-6 offset-md-3">
                            <form method="post" action="{{ route('grabarGasto')}}">
                                <div class="form-group">
                                    <label for="fecha" class="form-label">Fecha</label>
                                    <input name="fecha" type="date" class="form-control" id="fecha" aria-describedby="fecha" required>
                                </div>
                                <div class="form-group">
                                    <label for="monto" class="form-label">Monto</label>
                                    <input name="monto" type="number" class="form-control" id="monto" aria-describedby="monto" required>
                                </div>
                                <div class="form-group">
                                    <label for="concepto" class="form-label">Concepto</label>
                                    {{-- <input name="id_concepto" type="text" class="form-control" id="concepto" aria-describedby="concepto" required> --}}
                                    <select name="id_concepto">
                                        @foreach ($conceptos as $concepto)
                                            <option class="form-control" value="{{ $concepto->id }}">{{ $concepto->concepto }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="observacion" class="form-label">Observaciones</label>
                                    <textarea name="observacion" class="form-control" id="observacion" aria-describedby="observacion" cols="30" rows="6"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary" title="grabar">Grabar</button>
                                @csrf
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
@endsection

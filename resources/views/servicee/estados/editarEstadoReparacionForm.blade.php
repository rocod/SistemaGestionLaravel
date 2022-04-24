@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Estados de Reparación</h1>

                    </div>
                    <div class="row">
                        <div class="col">
                            <h3 class="text-primary">Editar</h3>
                        </div>
                        
                    </div>

                    <div class="row">

                        <div class="col-md-6 offset-md-3">
                            <form method="POST" action="{{ route('editarEstadoReparacion' , $estado_reparacion) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="estado" class="form-label">Estado</label>
                                    <input name="estado" type="text" class="form-control" id="estado" aria-describedby="estado" required value="{{ old('estado', $estado_reparacion->estado) }}">
                                </div>
                                <div class="form-group">
                                    <label for="mensaje" class="form-label">Teléfono</label>
                                    <input name="mensaje" type="text" class="form-control" id="mensaje" aria-describedby="mensaje" value="{{ old('mensaje', $estado_reparacion->mensaje) }}">
                                </div>
                                <button type="submit" class="btn btn-primary" title="grabar">Modificar</button>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
@endsection

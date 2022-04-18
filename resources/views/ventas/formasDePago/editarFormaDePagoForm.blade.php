@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Redes Sociales</h1>

                    </div>
                    <div class="row">
                        <div class="col">
                            <h3 class="text-primary">Editar</h3>
                        </div>
                        
                    </div>

                    <div class="row">

                        <div class="col-md-6 offset-md-3">
                            <form method="POST" action="{{ route('editarFormaDePago' , $forma_de_pago) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="forma_de_pago" class="form-label">Forma de pago</label>
                                    <input name="forma_pago" type="text" class="form-control" id="forma_de_pago" aria-describedby="forma_de_pago" required value="{{ old('forma_pago', $forma_de_pago->forma_pago) }}">
                                </div>
                                <div class="form-group">
                                    <label for="provincia" class="form-label">Provincia</label>
                                    <input name="provincia" type="text" class="form-control" id="provincia" aria-describedby="provincia" value="{{ old('provincia', $forma_de_pago->provincia) }}">
                                </div>
                                <div class="form-group">
                                    <label for="localidad" class="form-label">Localidad</label>
                                    <input name="localidad" type="text" class="form-control" id="localidad" aria-describedby="localidad" value="{{ old('localidad', $forma_de_pago->localidad) }}">
                                </div>
                                <div class="form-group">
                                    <label for="cp" class="form-label">Código Postal</label>
                                    <input name="cp" type="number" class="form-control" id="cp" aria-describedby="cp" value="{{ old('cp', $forma_de_pago->cp) }}">
                                </div>
                                <div class="form-group">
                                    <label for="direccion" class="form-label">Dirección</label>
                                    <input name="direccion" type="text" class="form-control" id="direccion" aria-describedby="direccion" value="{{ old('direccion', $forma_de_pago->direccion) }}">
                                </div>
                                <div class="form-group">
                                    <label for="telefono" class="form-label">Télefoo</label>
                                    <input name="telefono" type="text" class="form-control" id="telefono" aria-describedby="telefono" value="{{ old('telefono', $forma_de_pago->telefono) }}">
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

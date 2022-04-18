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
                            <h3 class="text-primary">Agregar forma de pago</h3>
                        </div>
                        
                    </div>

                    <div class="row">

                        <div class="col-md-6 offset-md-3">
                            <form method="post" action="{{ route('grabarFormaDePago')}}">
                                <div class="form-group">
                                    <label for="forma_de_pago" class="form-label">Forma de pago</label>
                                    <input name="forma_pago" type="text" class="form-control" id="forma_de_pago" aria-describedby="forma_de_pago" required>
                                </div>
                                <div class="form-group">
                                    <label for="provincia" class="form-label">Provincia</label>
                                    <input name="provincia" type="text" class="form-control" id="provincia" aria-describedby="provincia">
                                </div>
                                <div class="form-group">
                                    <label for="localidad" class="form-label">Localidad</label>
                                    <input name="localidad" type="text" class="form-control" id="localidad" aria-describedby="localidad">
                                </div>
                                <div class="form-group">
                                    <label for="cp" class="form-label">Código Postal</label>
                                    <input name="cp" type="number" class="form-control" id="cp" aria-describedby="cp">
                                </div>
                                <div class="form-group">
                                    <label for="direccion" class="form-label">Dirección</label>
                                    <input name="direccion" type="text" class="form-control" id="direccion" aria-describedby="direccion">
                                </div>
                                <div class="form-group">
                                    <label for="telefono" class="form-label">Télefoo</label>
                                    <input name="telefono" type="text" class="form-control" id="telefono" aria-describedby="telefono">
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

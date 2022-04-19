@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Contrareembolsos</h1>

                    </div>
                    <div class="row">
                        <div class="col">
                            <h3 class="text-primary">Agregar contrareembolso</h3>
                        </div>
                        
                    </div>

                    <div class="row">

                        <div class="col-md-6 offset-md-3">
                            <form method="post" action="{{ route('grabarContrareembolso')}}">
                                <div class="form-group">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input name="nombre" type="text" class="form-control" id="nombre" aria-describedby="nombre" required>
                                </div>
                                <div class="form-group">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input name="telefono" type="text" class="form-control" id="telefono" aria-describedby="telefono">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input name="email" type="text" class="form-control" id="email" aria-describedby="email">
                                </div>
                                <div class="form-group">
                                    <label for="direccion" class="form-label">Dirección</label>
                                    <input name="direccion" type="text" class="form-control" id="direccion" aria-describedby="direccion">
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

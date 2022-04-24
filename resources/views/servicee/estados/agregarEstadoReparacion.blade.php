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
                            <h3 class="text-primary">Agregar estado de reparación</h3>
                        </div>
                        
                    </div>

                    <div class="row">

                        <div class="col-md-6 offset-md-3">
                            <form method="post" action="{{ route('grabarEstadoReparacion')}}">
                                <div class="form-group">
                                    <label for="estado" class="form-label">Estado</label>
                                    <input name="estado" type="text" class="form-control" id="estado" aria-describedby="estado" required>
                                </div>
                                <div class="form-group">
                                    <label for="mensaje" class="form-label">Mensaje</label>
                                    <input name="mensaje" type="text" class="form-control" id="mensaje" aria-describedby="mensaje">
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

@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Depósitos</h1>

                    </div>
                    <div class="row">
                        <div class="col">
                            <h3 class="text-primary">Editar Depósito</h3>
                        </div>
                        
                    </div>

                    <div class="row">

                        <div class="col-md-6 offset-md-3">
                            <form method="post" action="{{ route('editarDeposito', $deposito)}}" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input name="nombre" type="text" class="form-control" id="nombre" aria-describedby="nombre" required value="{{ old('nombre', $deposito->nombre) }}">
                                </div>
                                <div class="form-group">
                                    <label for="nro_cuenta" class="form-label">Nro. de la cuenta</label>
                                    <input name="nro_cuenta" type="number" class="form-control" id="nro_cuenta" aria-describedby="nro_cuenta" required value="{{ old('nro_cuenta', $deposito->nro_cuenta) }}">
                                </div>
                                <div class="form-group">
                                    <label for="cbu" class="form-label">CBU</label>
                                    <input name="cbu" type="number" class="form-control" id="cbu" aria-describedby="cbu" required value="{{ old('cbu', $deposito->cbu) }}">
                                </div>
                                <div class="form-group">
                                    <label for="banco" class="form-label">Banco</label>
                                    <input name="banco" type="text" class="form-control" id="banco" aria-describedby="banco" required value="{{ old('banco', $deposito->banco) }}">
                                </div>
                                <div class="form-group">
                                    <label for="titular" class="form-label">Títular de la cuenta</label>
                                    <input name="titular" type="text" class="form-control" id="titular" aria-describedby="titular" required value="{{ old('titular', $deposito->titular) }}">
                                </div>
                                <button type="submit" class="btn btn-primary" title="grabar">Grabar</button>
                                @method('PUT')
                                @csrf
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
@endsection

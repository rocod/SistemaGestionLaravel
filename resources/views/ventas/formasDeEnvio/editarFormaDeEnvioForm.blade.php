@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Formas de envío</h1>

                    </div>
                    <div class="row">
                        <div class="col">
                            <h3 class="text-primary">Editar</h3>
                        </div>
                        
                    </div>

                    <div class="row">

                        <div class="col-md-6 offset-md-3">
                            <form method="POST" action="{{ route('editarFormaDeEnvio' , $forma_de_envio) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="forma_de_envio" class="form-label">Forma de envío</label>
                                    <input name="forma_envio" type="text" class="form-control" id="forma_de_envio" aria-describedby="forma_de_envio" required value="{{ old('forma_envio', $forma_de_envio->forma_envio) }}">
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

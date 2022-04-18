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
                            <form method="POST" action="{{ route('editarRedSocial' , $red_social) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="red" class="form-label">Red Social</label>
                                    <input id="red" name="nombre" type="text" class="form-control" aria-describedby="red" required value="{{ old('nombre', $red_social->nombre) }}">
                                </div>
                                <div class="form-group">
                                    <label for="direccion_url" class="form-label">Dirección URL</label>
                                    <textarea 
                                        name="direccion" 
                                        class="form-control"
                                        id="direccion_url" 
                                        aria-describedby="direccion_url"
                                        placeholder="Ingrese dirección URL..." 
                                        required>
                                    </textarea>
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

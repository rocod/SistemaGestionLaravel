@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Datos del Local</h1>

                    </div>
                    <div class="row">
                        <div class="col">
                            <h3 class="text-primary">Editar</h3>
                        </div>
                        
                    </div>

                    <div class="row">

                        <div class="col-md-6 offset-md-3">
                            <form method="POST" action="{{ route('editarDatoDeContacto' , $dato) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @if ( $dato->id == 1 || 2 && !3)
                                    <h3>{{ $dato->seccion }}</h3>
                                    <div class="form-group">
                                        <label for="linea1" class="form-label">Línea 1</label>
                                        <textarea name="linea1" id="linea1" cols="30" rows="2" class="form-control" required>
                                            {{ old('linea1', $dato->linea1) }}
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="linea2" class="form-label">Línea 2</label>
                                        <textarea name="linea2" id="linea2" cols="30" rows="2" class="form-control" required>
                                            {{ old('linea2', $dato->linea2) }}
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="linea2" class="form-label">Línea 3</label>
                                        <textarea name="linea3" id="linea3" cols="30" rows="2" class="form-control" required>
                                            {{ old('linea3', $dato->linea3) }}
                                        </textarea>
                                    </div>
                                    @elseif( $dato->id == 2 )
                                    <h3>{{ $dato->seccion }}</h3>
                                    <div class="form-group">
                                        <label for="linea1" class="form-label">Línea 1</label>
                                        <textarea name="linea1" id="linea1" cols="30" rows="2" class="form-control" required>
                                            {{ old('linea1', $dato->linea1) }}
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="linea2" class="form-label">Línea 2</label>
                                        <textarea name="linea2" id="linea2" cols="30" rows="2" class="form-control" required>
                                            {{ old('linea2', $dato->linea2) }}
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="linea3" class="form-label">Línea 3</label>
                                        <textarea name="linea3" id="linea3" cols="30" rows="2" class="form-control" required>
                                            {{ old('linea3', $dato->linea3) }}
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="linea4" class="form-label">Línea 4</label>
                                        <textarea name="linea4" id="linea4" cols="30" rows="2" class="form-control" required>
                                            {{ old('linea4', $dato->linea4) }}
                                        </textarea>
                                    </div>
                                    @elseif( $dato->id == 3 )
                                    <h3>{{ $dato->seccion }}</h3>
                                    <div class="form-group">
                                        <label for="linea1" class="form-label">Línea 1</label>
                                        <textarea name="linea1" id="linea1" cols="30" rows="2" class="form-control" required>
                                            {{ old('linea1', $dato->linea1) }}
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="linea2" class="form-label">Línea 2</label>
                                        <textarea name="linea2" id="linea2" cols="30" rows="2" class="form-control" required>
                                            {{ old('linea2', $dato->linea2) }}
                                        </textarea>
                                    </div>
                                @endif

                                <button type="submit" class="btn btn-primary" title="grabar">Modificar</button>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
@endsection

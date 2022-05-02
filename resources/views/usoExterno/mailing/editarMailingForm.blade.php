@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Mailing</h1>

                    </div>
                    <div class="row">
                        <div class="col">
                            <h3 class="text-primary">Editar</h3>
                        </div>
                        
                    </div>

                    <div class="row">

                        <div class="col-md-6 offset-md-3">
                            <form method="POST" action="{{ route('editarMailing' , $mailing) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="asunto" class="form-label">Asunto</label>
                                    <input name="asunto" type="text" class="form-control" id="asunto" aria-describedby="asunto" required value="{{ old('asunto', $mailing->asunto) }}">
                                </div>
                                <div class="form-group">
                                    <label for="cuerpo" class="form-label">Cuerpo</label>
                                    <textarea name="cuerpo" id="cuerpo" class="form-control" cols="30" rows="6" required>{{ old('cuerpo', $mailing->cuerpo) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <p>Imagen anterior</p>
                                    <img src="{{ $mailing->archivo_adjunto }}" alt="">
                                    <br>
                                    <label for="archivo_adjunto" class="form-label">Nuevo Archivo Adjunto</label>
                                    <input type="file" name="archivo_adjunto">
                                </div>
                                <div class="form-group">
                                    <label for="posicion" class="form-label">Posición</label>
                                    <input name="posicion" type="number" class="form-control" id="posicion" aria-describedby="posicion" required value="{{ old('posicion', $mailing->posicion) }}">
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

@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Preguntas Frecuentes</h1>

                    </div>
                    <div class="row">
                        <div class="col">
                            <h3 class="text-primary">Crear nueva</h3>
                        </div>
                        
                    </div>

                    <div class="row">

                        <div class="col-md-6 offset-md-3">
                           <form method="post" action="{{ route('grabarPregunta')}}">
                            @csrf
                                <div class="form-group">
                                    <label for="pregunta" class="form-label">Pregunta</label>
                                    <textarea name="pregunta" class="form-control"
                                        id="pregunta" aria-describedby="Pregunta frecuente"
                                        placeholder="Ingrese la pregunta..." required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="respuesta" class="form-label">Respuesta</label>
                                    <textarea name="respuesta" class="form-control"
                                        id="respuesta" aria-describedby="Respuesta"
                                        placeholder="Ingrese la respuesta..." required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="posicion" class="form-label">Posición</label>                                    
                                    <input type="text" aria-describedby="Posición en la que se muestra la pregunta"  class="form-control" name="posicion" id="posicion" >
                                </div>
                                <button type="submit" class="btn btn-primary" title="grabar">Grabar</button>
                               
                            </form>
                        </div>
                     
                    </div>

                   
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
@endsection

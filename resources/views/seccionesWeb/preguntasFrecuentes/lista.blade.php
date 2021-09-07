@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Preguntas Frecuentes</h1>
                    </div>

                    <div class="row">

                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th scope="col">Pregunta</th>
                              <th scope="col">Respuesta</th>
                              <th scope="col">Posición</th>
                              <th scope="col"></th>
                              <th scope="col">
                                <a class="text-success" href="/agregar_pregunta" title="Agregar nueva pregunta">
                                    <i class="fas fa-plus-circle fa-2x "></i>
                                </a>
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($preguntas as $pregunta)
                            <tr>
                              <td>{{ $pregunta->pregunta }}</td>
                              <td>{{ $pregunta->respuesta }}</td>
                              <td>{{ $pregunta->posicion }}</td>
                              <td>
                                <a title="Editar" class="text-info" href="{{ route('editarPreguntaForm', ['id'=>$pregunta->id]) }}">
                                    <i class="fas fa-pencil-alt fa-2x"></i>
                                </a>
                               </td>
                              <td>
                               <a title="Eliminar" class="text-info" href="{{ route('eliminarPreguntaForm', ['id'=>$pregunta->id]) }}">
                                   <i class="far fa-trash-alt fa-2x"></i>
                                </a>
                              </td>
                            </tr>
                            @endforeach
                            
                            
                          </tbody>
                        </table>
                     
                    </div>

                   
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
@endsection

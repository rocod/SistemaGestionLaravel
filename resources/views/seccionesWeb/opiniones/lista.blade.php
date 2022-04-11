@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Opiniones</h1>
                    </div>

                    <div class="row">

                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th scope="col">Opinion</th>
                              <th scope="col">Respuesta</th>
                              <th scope="col">Posición</th>
                              <th scope="col"></th>
                              <th scope="col"></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($opiniones as $opinion)
                            <tr>
                              <td>{{ $opinion->opinion }}</td>
                              <td>{{ $opinion->respuesta }}</td>
                              <td>{{ $opinion->posicion }}</td>
                              <td>
                                <a title="Editar" class="text-info" href="{{ route('editarPreguntaForm', ['id'=>$opinion->id]) }}">
                                    <i class="fas fa-pencil-alt fa-2x"></i>
                                </a>
                               </td>
                              <td>
                               <a title="Eliminar" class="text-info" href="{{ route('eliminarPreguntaForm', ['id'=>$opinion->id]) }}">
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

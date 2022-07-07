@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Operadores</h1>
                    </div>

                    <div class="row">

                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th scope="col">N° Operador</th>
                              <th scope="col">Nombre</th>
                              <th scope="col">Apellido</th>
                              <th scope="col">Email</th>
                              <th scope="col"></th>
                              <th scope="col">
                                <a class="text-success" href="/agregar_operador" title="Agregar operador">
                                    <i class="fas fa-plus-circle fa-2x "></i>
                                </a>
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($users as $user)
                            <tr>
                              <td>{{ $user->id }}</td>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->apellido }}</td>
                              <td>{{ $user->email }}</td>
                              <td>
                                <a title="Editar" class="text-info" href="{{ route('editarOperadorForm', ['id'=>$user->id]) }}">
                                    <i class="fas fa-pencil-alt fa-2x"></i>
                                </a>
                               </td>
                              <td>
                               <a title="Eliminar" class="text-info" href="{{ route('eliminarOperadorForm', ['id'=>$user->id]) }}">
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

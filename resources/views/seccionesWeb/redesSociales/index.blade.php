@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Redes Sociales</h1>
                    </div>

                    <div class="row">

                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th scope="col">Red</th>
                              <th scope="col">Dirección</th>
                              <th scope="col"></th>
                              <th scope="col">
                                <a class="text-success" href="{{ route('redes_sociales.create') }}" title="Agregar nueva red social">
                                    <i class="fas fa-plus-circle fa-2x "></i>
                                </a>
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($redes_sociales as $red_social)
                            <tr>
                              <td>{{ $red_social->nombre }}</td>
                              <td>{{ $red_social->direccion }}</td>
                              <td>
                                <a title="Editar" class="text-info" href="{{ route('redes_sociales.edit', $red_social) }}">
                                    <i class="fas fa-pencil-alt fa-2x"></i>
                                </a>
                               </td>
                              <td>
                               <a title="Eliminar" class="text-info" href="{{ route('redes_sociales.destroy', $red_social) }}">
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

@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Productos</h1>
                    </div>

                    <div class="row">

                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th scope="col">Nombre</th>
                              <th scope="col">Imagen</th>
                              <th scope="col">Código</th>
                              <th scope="col"></th>
                              <th scope="col">
                                <a class="text-success" href="/agregar_producto" title="Agregar nueva producto">
                                    <i class="fas fa-plus-circle fa-2x "></i>
                                </a>
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($productos as $producto)
                            <tr>
                              <td>{{ $producto->nombre }}</td>
                              <td>{{ $producto->imagen }}</td>
                              <td>{{ $producto->codigo }}</td>
                              <td>
                                <a title="Editar" class="text-info" href="{{ route('editarProductoForm', ['id'=>$producto->id]) }}">
                                    <i class="fas fa-pencil-alt fa-2x"></i>
                                </a>
                               </td>
                              <td>
                               <a title="Eliminar" class="text-info" href="{{ route('eliminarProductoForm', ['id'=>$producto->id]) }}">
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

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
                              <th scope="col">Código</th>
                              <th scope="col">Imagen</th>
                              <th scope="col">Nombre</th>
                              <th scope="col">Precio</th>
                              <th scope="col">Descripción</th>
                             
                              <th scope="col">Dest.</th>
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
                              <td>{{ $producto->codigo }}</td>
                              <td>@if($producto->imagen1)
                               <img src="img/productos/{{ $producto->imagen1 }}" width="90" />
                              @endif</td>
                              <td>{{ $producto->nombre  }}</td>
                              <td>{{ $producto->precio }}</td>
                              <td>{{ $producto->descripcion }}</td>

                              <td>@if($producto->destacado=='0') No @else Si @endif</td>
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

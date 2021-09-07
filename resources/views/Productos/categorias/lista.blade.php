@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Categorías</h1>
                    </div>

                    <div class="row">
                      <div class="col-md-5">
                        <table class="table ">
                          <thead>
                            <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Nombre</th>
                              <th scope="col">N° Orden</th>
                              <th scope="col">Oculta</th>
                              <th scope="col">Link</th>
                              <th scope="col"></th>
                              <th scope="col">
                                <a class="text-success" href="/agregar_categoria" title="Agregar nueva categoria">
                                    <i class="fas fa-plus-circle fa-2x "></i>
                                </a>
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($categorias as $categoria)
                            <tr>
                              <td>{{ $categoria->id }}</td>
                              <td><a href="categorias/{{ $categoria->id }}">{{ $categoria->opcion }}</a></td>
                              <td>{{ $categoria->orden }}</td>
                              <td>{{ $categoria->oculta }}</td>
                              <td><a class="text-warning" href="http://sanjavucho.com.ar/catalogo.php?categoria={{ $categoria->id }}" target="_blank"><i class="fas fa-link fa-2x "></i></a></td>
                              <td>
                                <a title="Editar" class="text-info" href="{{ route('editarCategoriaForm', ['id'=>$categoria->id]) }}">
                                    <i class="fas fa-pencil-alt fa-2x"></i>
                                </a>
                               </td>
                              <td>
                               <a title="Eliminar" class="text-info" href="">
                                   <i class="far fa-trash-alt fa-2x"></i>
                                </a>
                              </td>
                            </tr>
                            @endforeach
                            
                            
                          </tbody>
                        </table>  
                      </div>
                      <div class="col-md-4">
                        @if(isset($subcategorias))

                        <table class="table ">
                          <thead>
                            <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Nombre</th>
                              <th scope="col">N° Orden</th>
                             
                              <th scope="col"></th>
                              <th scope="col">
                                <a class="text-success" href="/agregar_categoria" title="Agregar nueva categoria">
                                    <i class="fas fa-plus-circle fa-2x "></i>
                                </a>
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($subcategorias as $subcategoria)
                            <tr>
                              <td>{{ $subcategoria->id }}</td>
                              <td><a href="categorias/{{ $categoria->id }}/{{ $subcategoria->id }}">{{ $subcategoria->opcion }}</a></td>
                              <td>{{ $subcategoria->orden }}</td>                             
                              <td>
                                <a title="Editar" class="text-info" href="{{ route('editarCategoriaForm', ['id'=>$subcategoria->id]) }}">
                                    <i class="fas fa-pencil-alt fa-2x"></i>
                                </a>
                               </td>
                              <td>
                               <a title="Eliminar" class="text-info" href="">
                                   <i class="far fa-trash-alt fa-2x"></i>
                                </a>
                              </td>
                            </tr>
                            @endforeach
                            
                            
                          </tbody>
                        </table>  

                        @endif
                      </div>
                      <div class="col-md-3">
                        
                      </div>
                    </div>

                   
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
@endsection

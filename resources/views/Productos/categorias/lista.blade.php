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
                        <h5>Categoría<br><b> @if(isset($cat)) {{$cat->opcion}} @endif</b></h5>
                      </div>
                      <div class="col-md-3">
                        <h5>Subcategoría<br> <b>@if(isset($sub)) 
                          
                            {{$sub->opcion}} 
                         
                        @endif</b></h5>
                      </div>
                      <div class="col-md-3">
                        <h5>Subsubcategorías</h5>
                      </div>
                    </div>    

                    <div class="row">
                      <div class="col-md-5">
                        <table class="table border-right">
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
                                    <i class="fas fa-plus-circle "></i>
                                </a>
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($categorias as $categoria)
                            <tr>
                              <td>{{ $categoria->id }}</td>
                              <td><a href="{{ route('categorias', ['categoria'=>$categoria->id])}}">{{ $categoria->opcion }}</a></td>
                              <td>{{ $categoria->orden }}</td>
                              <td>@if($categoria->oculta==0)No @else Si @endif</td>
                              <td><a class="text-warning" href="http://sanjavucho.com.ar/catalogo.php?categoria={{ $categoria->id }}" target="_blank"><i class="fas fa-link"></i></a></td>
                              <td>
                                <a title="Editar" class="text-info" href="{{ route('editarCategoriaForm', ['id'=>$categoria->id]) }}">
                                    <i class="fas fa-pencil-alt "></i>
                                </a>
                               </td>
                              <td>
                               <a title="Eliminar" class="text-info" href="{{ route('eliminarCategoriaForm', ['id'=>$categoria->id]) }}">
                                   <i class="far fa-trash-alt "></i>
                                </a>
                              </td>
                            </tr>
                            @endforeach
                            
                            
                          </tbody>
                        </table>  
                      </div>
                      <div class="col-md-3 ">
                        @if(isset($subcategorias))                        

                        <table class="table border-right">
                          <thead>
                            <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Nombre</th>
                              <th scope="col">N° Orden</th>
                             
                              <th scope="col"></th>
                              <th scope="col">
                                <a class="text-success" href="{{ route('agregarSubcategoria', ['id_categoria'=>$cat->id]) }}" title="Agregar nueva Subcategoria">
                                    <i class="fas fa-plus-circle "></i>
                                </a>
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($subcategorias as $subcategoria)
                            <tr>
                              <td>{{ $subcategoria->id }}</td>
                              <td><a href="{{ route('categorias', ['categoria'=>$cat->id, 'subcategoria'=>$subcategoria->id])}}">{{ $subcategoria->opcion }}</a></td>
                              <td>{{ $subcategoria->orden }}</td>                             
                              <td>
                                <a title="Editar" class="text-info" href="{{ route('editarSubcategoriaForm', ['id'=>$subcategoria->id, 'id_categoria'=>$cat->id]) }}">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                               </td>
                              <td>
                               <a title="Eliminar" class="text-info" href="{{ route('eliminarSubcategoriaForm', ['id'=>$subcategoria->id, 'id_categoria'=>$cat->id]) }}">
                                   <i class="far fa-trash-alt"></i>
                                </a>
                              </td>
                            </tr>
                            @endforeach
                            
                            
                          </tbody>
                        </table>  

                        @endif
                      </div>
                      <div class="col-md-3 ml-2">
                        @if(isset($subsubcategorias))

                        

                        <table class="table ">
                          <thead>
                            <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Nombre</th>
                              <th scope="col">N° Orden</th>
                             
                              <th scope="col"></th>
                              <th scope="col">
                                <a class="text-success" href="{{ route('agregarSubsubcategoria', ['id_categoria'=>$cat->id, 'id_subcategoria'=>$sub->id]) }}" title="Agregar nueva Subsubategoria">
                                    <i class="fas fa-plus-circle"></i>
                                </a>
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($subsubcategorias as $subsubcategoria)
                            <tr>
                              <td>{{ $subsubcategoria->id }}</td>
                              <td>{{ $subsubcategoria->opcion }}</td>
                              <td>{{ $subsubcategoria->orden }}</td>                             
                              <td>
                                <a title="Editar" class="text-info" href="{{ route('editarSubsubcategoriaForm', ['id'=>$subsubcategoria->id, 'id_categoria'=>$cat, 'id_subcategoria'=>$sub]) }}">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                               </td>
                              <td>
                               <a title="Eliminar" class="text-info" href="{{ route('eliminarSubsubcategoriaForm', ['id'=>$subsubcategoria->id, 'id_categoria'=>$cat, 'id_subcategoria'=>$sub]) }}">
                                   <i class="far fa-trash-alt"></i>
                                </a>
                              </td>
                            </tr>
                            @endforeach
                            
                            
                          </tbody>
                        </table>  

                        @endif
                        
                      </div>
                    </div>

                   
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
@endsection

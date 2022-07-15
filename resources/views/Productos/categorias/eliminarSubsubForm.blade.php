@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Subsubcategorías</h1>

                    </div>
                    <div class="row">
                        <div class="col">
                            <h3 class="text-primary">Eliminar subsubcategoría</h3>
                            <p class="text-danger text-center"><b>Esta por eliminar esta subsubcategoria de manera permanente, para confirmar presione Eliminar.<br>
                            Si la subsubcategoría ya tiene relacionados productos no podrá eliminarla</b></p>
                        </div>
                        
                    </div>

                    <div class="row">

                        <div class="col-md-6 offset-md-3">
                           <form method="post" action="{{ route('eliminarSubsubcategoria' , ['id'=>$subsubcategoria->id, 'id_categoria'=>$id_categoria, 'id_subcategoria'=>$id_subcategoria])}}">
                            @csrf
                            @method('DELETE')
                                <div class="form-group">
                                    <label for="subsubcategoria" class="form-label">Subcategoría</label>
                                    <textarea name="subsubcategoria" class="form-control"
                                        id="subsubcategoria" readonly aria-describedby="Subsubcategoría">{{ $subsubcategoria->opcion }}</textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label for="posicion" class="form-label">Orden</label>                                    
                                    <input type="text" aria-describedby="Posición en la que se muestra la subsubcategoria" readonly  class="form-control" name="orden" id="orden" value="{{ $subsubcategoria->orden }}" >
                                </div>
                                <button type="submit" class="btn btn-primary" title="grabar">Eliminar</button>
                               
                            </form>
                        </div>
                     
                    </div>

                   
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
@endsection

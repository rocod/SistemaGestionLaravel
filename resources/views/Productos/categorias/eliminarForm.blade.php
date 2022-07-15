@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Categorías</h1>

                    </div>
                    <div class="row">
                        <div class="col">
                            <h3 class="text-primary">Eliminar categoría</h3>
                            <p class="text-danger text-center"><b>Esta por eliminar esta categoria de manera permanente, para confirmar presione Eliminar.<br>
                            Si la categoría ya tiene relacionadas subcategorías no podrá eliminarla</b></p>
                        </div>
                        
                    </div>

                    <div class="row">

                        <div class="col-md-6 offset-md-3">
                           <form method="post" action="{{ route('eliminarCategoria' , ['id'=>$categoria->id])}}">
                            @csrf
                            @method('DELETE')
                                <div class="form-group">
                                    <label for="categoria" class="form-label">Categoría</label>
                                    <textarea name="categoria" class="form-control"
                                        id="categoria" readonly aria-describedby="Categoría"
                                        placeholder="Ingrese la categoría..." required>{{ $categoria->opcion }}</textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label for="posicion" class="form-label">Orden</label>                                    
                                    <input type="text" aria-describedby="Posición en la que se muestra la categoría" readonly  class="form-control" name="orden" id="orden" value="{{ $categoria->orden }}" >
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

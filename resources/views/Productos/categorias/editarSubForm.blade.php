@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Subcategorías</h1>

                    </div>
                    <div class="row">
                        <div class="col">
                            <h3 class="text-primary">Editar</h3>
                        </div>
                        
                    </div>

                    <div class="row">

                        <div class="col-md-6 offset-md-3">
                           <form method="post" action="{{ route('editarSubcategoria' , ['id'=>$subcategoria->id, 'id_categoria'=>$id_categoria])}}">
                            @csrf
                            @method('PUT')
                                <div class="form-group">
                                    <label for="opcion" class="form-label">Subcategoría</label>
                                    <input type="text" class="form-control" name="opcion" id="opcion" required aria-describedby="Categoría" value="{{ $subcategoria->opcion }}">                                    
                                </div>
                                <div class="form-group">
                                    <label for="orden" class="form-label">N° Orden</label>
                                     <input type="text" required class="form-control" name="orden" id="orden" aria-describedby="Nro de Orden" value="{{ $subcategoria->orden }}">  
                                </div>
                                <div class="form-group">
                                    <label for="posicion" class="form-label">Oculta</label>                                    
                                    <select class="form-control" name="oculta" id="oculta">
                                        <option value="0" @if($subcategoria->oculta==0) selected @endif>No</option>
                                        <option value="1" @if($subcategoria->oculta==1) selected @endif>Si</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary" title="grabar">Modificar</button>
                               
                            </form>
                        </div>
                     
                    </div>

                   
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
@endsection

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
                            <h3 class="text-primary">Crear nueva Subsubcategoría para {{ $subcategoria->opcion }}</h3>
                        </div>
                        
                    </div>

                    <div class="row">

                        <div class="col-md-6 offset-md-3">
                           <form method="post" action="{{ route('grabarSubsubcategoria', ['id_categoria'=>$categoria->id, 'id_subcategoria'=>$subcategoria->id])}}">
                            @csrf
                                <div class="form-group">
                                    <label for="opcion" class="form-label">Subsubcategoría</label>
                                    <input type="text" required class="form-control" name="opcion" id="opcion" aria-describedby="Subsubcategoría">                                    
                                </div>
                                <div class="form-group">
                                    <label for="orden" class="form-label">N° Orden</label>
                                     <input type="text" required class="form-control" name="orden" id="orden" aria-describedby="Nro de Orden">  
                                </div>
                               
                                <button type="submit" class="btn btn-primary" title="grabar">Grabar</button>
                               
                            </form>
                        </div>
                     
                    </div>

                   
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
@endsection

@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Productos</h1>

                    </div>
                    <div class="row">
                        <div class="col">
                            <h3 class="text-primary">Crear nuevo</h3>
                        </div>
                        
                    </div>

                    <div class="row">

                        <div class="col-md-6 offset-md-3">
                           <form method="post" enctype="multipart/form-data" action="{{ route('grabarImagen')}}">
                            @csrf
                                
                                <div class="form-group">
                                    <label for="imagen1" class="form-label">Imagen 1</label>
                                    <input type="file"  class="form-control" name="imagen1" id="imagen1" >
                                    <small id="emailHelp" class="form-text text-muted"><b>El tamaño óptimo de la imagen: 620 x 465 pixeles.</b></small>
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

@section('script')

<script type="text/javascript">
  $('#categoria_id').on('change', function(){

  $value=$(this).val();
    $.ajax({
    type : 'get',
    url : '{{URL::to('subcategorias/listar')}}/'+$value,
   
    success:function(data){
    $('#subcategoria_id').html(data);
    }
    });

});
</script>
<script type="text/javascript">
$('#subcategoria_id').on('change', function(){

  $value=$(this).val();
    $.ajax({
    type : 'get',
    url : '{{URL::to('subsubcategorias/listar')}}/'+$value,
   
    success:function(data){
    $('#subsubcategoria_id').html(data);
    }
    });

});
</script>

@endsection

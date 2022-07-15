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
                           <form method="post" action="{{ route('grabarProducto')}}">
                            @csrf
                                <div class="form-group">
                                    <label for="categoria" class="form-label">Categoría</label>
                                    <select class="form-control" name="categoria_id" id="categoria_id">
                                        <option value="">Seleccione</option>
                                        @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id}}">{{ $categoria->opcion}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="categoria" class="form-label">Subcategoría</label>
                                    <select class="form-control" name="subcategoria_id" id="subcategoria_id">
                                       
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="categoria" class="form-label">Subsubcategoría</label>
                                    <select class="form-control" name="subsubcategoria_id" id="subsubcategoria_id">
                                       
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" aria-describedby="NOmbre del producto"  class="form-control" name="nombre" id="nombre" >
                                </div>
                                <div class="form-group">
                                    <label for="PRecio" class="form-label">Precio</label>
                                    <input type="text" aria-describedby="PRecio del producto"  class="form-control" name="precio" id="precio" >
                                </div>
                                <div class="form-group">
                                    <label for="costo" class="form-label">Costo</label>
                                    <input type="text"  class="form-control" name="costo" id="costo" >
                                </div>
                                <div class="form-group">
                                    <label for="costo_dolar" class="form-label">Costo dolar</label>
                                    <input type="text"  class="form-control" name="costo_dolar" id="costo_dolar" >
                                </div>

                                <div class="form-group">
                                    <label for="descripcion" class="form-label">Descripcion</label>
                                    <textarea name="descripcion" class="form-control"
                                        id="descripcion" aria-describedby="descripcion"
                                        placeholder="Descripción del producto..." required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="imagen1" class="form-label">Imagen 1</label>
                                    <input type="file"  class="form-control" name="imagen1" id="imagen1" >
                                </div>
                                <div class="form-group">
                                    <label for="imagen2" class="form-label">Imagen 2</label>
                                    <input type="file"  class="form-control" name="imagen2" id="imagen2" >
                                </div>
                                <div class="form-group">
                                    <label for="imagen3" class="form-label">Imagen 3</label>
                                    <input type="file"  class="form-control" name="imagen3" id="imagen3" >
                                </div>
                                <div class="form-group">
                                    <label for="imagen4" class="form-label">Imagen 4</label>
                                    <input type="file"  class="form-control" name="imagen4" id="imagen4" >
                                </div>
                                <div class="form-group">
                                    <label for="Video" class="form-label">Video</label>
                                    <textarea name="video" class="form-control"
                                        id="video" aria-describedby="video"
                                        placeholder="video del producto..." required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="destacado" class="form-label">Destacado</label>
                                    <input type="text"  class="form-control" name="destacado" id="destacado" >
                                </div>
                                <div class="form-group">
                                    <label for="producto_estado" class="form-label">Estado</label>
                                    <select name="form-control" id="producto_destacado_id" name="producto_destacado_id">
                                        @foreach($estados as $estado)
                                        <option value="{{ $estado->id}}">
                                            {{ $estado->estado }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <input type="text"  class="form-control" name="destacado" id="destacado" >
                                </div>
                                <div class="form-group">
                                    <label for="producto_estado" class="form-label">Proveedores</label>
                                    <select name="form-control" id="producto_destacado_id" name="producto_destacado_id">
                                        @foreach($estados as $estado)
                                        <option value="{{ $estado->id}}">
                                            {{ $estado->estado }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <input type="text"  class="form-control" name="destacado" id="destacado" >
                                </div>
                                <div class="form-group">
                                    <label for="posicion" class="form-label">Posición</label>                                    
                                    <input type="text" aria-describedby="Posición en la que se muestra la pregunta"  class="form-control" name="posicion" id="posicion" >
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

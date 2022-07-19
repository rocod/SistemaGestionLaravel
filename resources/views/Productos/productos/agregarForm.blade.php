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
                           <form method="post" enctype="multipart/form-data" action="{{ route('grabarProducto')}}">
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
                                       <option value="0"> </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="categoria" class="form-label">Subsubcategoría</label>
                                    <select class="form-control" name="subsubcategoria_id" id="subsubcategoria_id">
                                       <option value="0"> </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" aria-describedby="NOmbre del producto"  class="form-control" name="nombre" id="nombre" >
                                </div>
                                <div class="form-group">
                                    <label for="codigo" class="form-label">Código</label>
                                    <input type="text" aria-describedby="Código del producto"  class="form-control" name="codigo" id="codigo" >
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
                                    <small id="emailHelp" class="form-text text-muted"><b>El tamaño óptimo de la imagen: 620 x 465 pixeles.</b></small>
                                </div>
                                <div class="form-group">
                                    <label for="imagen2" class="form-label">Imagen 2</label>
                                    <input type="file"  class="form-control" name="imagen2" id="imagen2" >
                                    <small id="emailHelp" class="form-text text-muted"><b>El tamaño óptimo de la imagen: 620 x 465 pixeles.</b></small>
                                </div>
                                <div class="form-group">
                                    <label for="imagen3" class="form-label">Imagen 3</label>
                                    <input type="file"  class="form-control" name="imagen3" id="imagen3" >
                                    <small id="emailHelp" class="form-text text-muted"><b>El tamaño óptimo de la imagen: 620 x 465 pixeles.</b></small>
                                </div>
                                <div class="form-group">
                                    <label for="imagen4" class="form-label">Imagen ampliada</label>
                                    <input type="file"  class="form-control" name="imagen4" id="imagen4" >
                                    <small id="emailHelp" class="form-text text-muted"><b>El tamaño óptimo de la imagen: 1200 x 1200 pixeles.</b></small>
                                </div>
                                <div class="form-group">
                                    <label for="Video" class="form-label">Video</label>
                                    <textarea name="video" class="form-control"
                                        id="video" aria-describedby="video"
                                        placeholder="video del producto..." ></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="destacado" class="form-label">Destacado</label>
                                    <select  class="form-control" name="destacado" id="destacado" >
                                        <option>No</option>
                                        <option>Si</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="producto_estado_id" class="form-label">Estado</label>
                                    <select class="form-control" id="producto_estado_id" name="producto_estado_id">
                                        @foreach($estados as $estado)
                                        <option value="{{ $estado->id}}">
                                            {{ $estado->estado }}
                                        </option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="proveedor_id" class="form-label">Proveedores</label>
                                    <select class="form-control" id="proveedor_id" name="proveedor_id">
                                        
                                        @foreach($proveedores as $prove)
                                        <option value="{{ $prove->id}}">
                                            {{ $prove->nombre }}
                                        </option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="precio_5" class="form-label">Precio x 5</label>                                    
                                    <input type="text" aria-describedby="Precio x 5 unidades"  class="form-control" name="precio_5" id="precio_5" >
                                </div>
                                <div class="form-group">
                                    <label for="precio_10" class="form-label">Precio x 10</label>                                    
                                    <input type="text" aria-describedby="Precio x 10 unidades"  class="form-control" name="precio_10" id="precio_10" >
                                </div>
                                <div class="form-group">
                                    <label for="precio_50" class="form-label">Precio x 50</label>                                    
                                    <input type="text" aria-describedby="Precio x 50 unidades"  class="form-control" name="precio_50" id="precio_50" >
                                </div>
                                <div class="form-group">
                                    <label for="stock" class="form-label">Stock</label>                                    
                                    <input type="text" aria-describedby="stock"  class="form-control" name="stock" id="stock" >
                                </div>
                                
                                <div class="form-group">
                                    <label for="stock_deposito" class="form-label">Stock Depósito</label>   

                                    <input type="text" aria-describedby="stock depósito"  class="form-control" name="stock_deposito" id="stock_deposito" >
                                </div>
                                <div class="form-group">
                                    <label for="codigo_barras" class="form-label">Código de Barras</label>                                    
                                    <input type="text" aria-describedby="Código de Barras"  class="form-control" name="codigo_barras" id="codigo_barras" >
                                </div>
                                <div class="form-group">
                                    <label for="precio_td" class="form-label">Precio tiempo de descuento</label>                                    
                                    <input type="text" aria-describedby="Precio tiempo de descuento"  class="form-control" name="precio_td" id="precio_td" >
                                </div>
                                <div class="form-group">
                                    <label for="fecha_td" class="form-label">Fecha tiempo de descuento</label>                                    
                                    <input type="date" aria-describedby="Fecha tiempo de descuento"  class="form-control" name="fecha_td" id="fecha_td" >
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

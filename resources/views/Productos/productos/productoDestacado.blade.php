@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Producto Destacado</h1>

                    </div>
                    <div class="row">
                        <div class="col">
                            <h3 class="text-primary">Buscar producto</h3>
                        </div>
                        
                    </div>

                    <div class="row">

                        <div class="col-md-6 offset-md-3">
                           <form method="post" action="{{ route('productoDestacado') }}" >
                            @csrf
                          
                                <div class="form-group">
                                    <label for="categoria" class="form-label">Categoría</label>
                                    <input class="form-control" name="producto_destacado"  id="producto_destacado" placeholder="Buscar producto destacado" />
                                    <div class="col-md-12 bg-light" id="contDestacado"></div>
                                </div>
                               
                            </form>
                        </div>                     
                    </div>
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                        </div>
                    </div>        

                   
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
@endsection

@section('script')

<script type="text/javascript">
  $('#producto_destacado').on('keyup', function(){

  $value=$(this).val();
    $.ajax({
    type : 'get',
    url : '{{URL::to('destacado/buscar')}}/'+$value,
   
    success:function(data){
    $('#contDestacado').html(data);
    }
    });

});


</script>


@endsection

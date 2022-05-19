@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Slider Home</h1>

                    </div>
                    <div class="row">
                        <div class="col">
                            <h3 class="text-primary">Agregar Slider</h3>
                        </div>
                        
                    </div>

                    <div class="row">

                        <div class="col-md-6 offset-md-3">
                            <form method="post" action="{{ route('grabarSlider')}}" enctype="multipart/form-data">
                                <div class="form-group">
                                    <p class="text-success fs-5 fw-bold">Importante: El tamaño óptimo de la imagen es de 1500 x 420 pixeles</p>
                                    <label for="imagen" class="form-label">Seleccionar Imagen</label>
                                    <input type="file" name="imagen" required accept="image/*">
                                </div>
                                <button type="submit" class="btn btn-primary" title="grabar">Grabar</button>
                                @csrf
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
@endsection

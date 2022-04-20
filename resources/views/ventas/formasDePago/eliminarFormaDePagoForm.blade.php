@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Preguntas Frecuentes</h1>

                    </div>
                    <div class="row">
                        <div class="col">
                            <h3 class="text-primary">Eliminar pregunta</h3>
                            <p class="text-danger text-center"><b>Esta por eliminar esta pregunta de manera permanente, para confirmar presione Eliminar</b></p>
                        </div>
                        
                    </div>

                    <div class="row">

                        <div class="col-md-6 offset-md-3">
                            <form method="post" action="{{ route('eliminarFormaDePago' , $forma_de_pago)}}">
                                @csrf
                                @method('DELETE')
                                
                                <p>Forma de pago: {{ $forma_de_pago->forma_pago }}</p>
                                <p>Provincia: {{ $forma_de_pago->provincia }}</p>
                                <p>Localidad: {{ $forma_de_pago->localidad }}</p>
                                <p>Código postal: {{ $forma_de_pago->cp }}</p>
                                <p>Dirección: {{ $forma_de_pago->direccion }}</p>
                                <p>Teléfono: {{ $forma_de_pago->telefono }}</p>
                                
                                <button type="submit" class="btn btn-primary" title="grabar">Eliminar</button>
                            
                            </form>
                        </div>
                    
                    </div>

                
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
@endsection

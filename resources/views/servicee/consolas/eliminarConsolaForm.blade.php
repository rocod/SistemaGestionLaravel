@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Modelos de Consolas</h1>

                    </div>
                    <div class="row">
                        <div class="col">
                            <h3 class="text-primary">Eliminar modelo de consola</h3>
                            <p class="text-danger text-center"><b>Esta por eliminar esta consola de manera permanente, para confirmar presione Eliminar</b></p>
                        </div>
                        
                    </div>

                    <div class="row">

                        <div class="col-md-6 offset-md-3">
                            <form method="post" action="{{ route('eliminarConsola' , $consola)}}">
                                @csrf
                                @method('DELETE')
                                
                                <p>Consola: {{ $consola->consola }}</p>
                                
                                <button type="submit" class="btn btn-primary" title="grabar">Eliminar</button>
                            
                            </form>
                        </div>
                    
                    </div>

                
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
@endsection

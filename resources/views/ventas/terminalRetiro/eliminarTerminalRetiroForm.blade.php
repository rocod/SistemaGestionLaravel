@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Terminal Retiro</h1>

                    </div>
                    <div class="row">
                        <div class="col">
                            <h3 class="text-primary">Eliminar terminal de Retiro</h3>
                            <p class="text-danger text-center"><b>Esta por eliminar esta terminal de Retiro de manera permanente, para confirmar presione Eliminar</b></p>
                        </div>
                        
                    </div>

                    <div class="row">

                        <div class="col-md-6 offset-md-3">
                            <form method="post" action="{{ route('eliminarTerminalRetiro' , $terminal_retiro)}}">
                                @csrf
                                @method('DELETE')
                                
                                <p>Nombre: {{ $terminal_retiro->nombre }}</p>
                                <p>Télefono: {{ $terminal_retiro->telefono }}</p>
                                <p>Dirección: {{ $terminal_retiro->direccion }}</p>
                                <p>E-mail: {{ $terminal_retiro->email }}</p>
                                
                                <button type="submit" class="btn btn-primary" title="grabar">Eliminar</button>
                            
                            </form>
                        </div>
                    
                    </div>

                
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
@endsection

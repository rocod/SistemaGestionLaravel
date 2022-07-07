@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Operadores</h1>

                    </div>
                    <div class="row">
                        <div class="col">
                            <h3 class="text-primary">Eliminar Operador</h3>
                            <p class="text-danger text-center"><b>Esta por eliminar este operador de manera permanente, para confirmar presione Eliminar</b></p>
                        </div>
                        
                    </div>

                    <div class="row">

                        <div class="col-md-6 offset-md-3">
                           <form method="post" action="{{ route('eliminarOperador' , ['id'=>$user->id])}}">
                            @csrf
                            @method('DELETE')
                                <div class="form-group">
                                    <label for="name" class="form-label">Nombre</label>
                                    <input type="text" name="name" class="form-control" id="name" aria-describedby="Nombre"  placeholder="Nombre" readonly value="{{ $user->nombre }}" />
                                </div>
                                <div class="form-group">
                                    <label for="apellido" class="form-label">Apellido</label>
                                    <input type="text" name="apellido" class="form-control" id="apellido" aria-describedby="Apellido"  placeholder="Apellido" readonly value="{{ $user->apellido }}" />
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" aria-describedby="Email"  placeholder="Email" readonly value="{{ $user->email }}" />
                                </div>
                                <button type="submit" class="btn btn-primary" title="Eliminar">Eliminar</button>
                               
                            </form>
                        </div>
                     
                    </div>

                   
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
@endsection

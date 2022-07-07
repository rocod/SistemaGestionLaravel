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
                            <h3 class="text-primary">Editar</h3>
                        </div>
                        
                    </div>

                    <div class="row">

                        <div class="col-md-12 ">
                           <form method="post" action="{{ route('editarOperador' , ['id'=>$user->id])}}">
                            @csrf
                            @method('PUT')
                                <div class="form-group">
                                    <label for="name" class="form-label">Nombre</label>
                                    <input type="text" name="name" class="form-control" id="name" aria-describedby="Nombre"                                    placeholder="Nombre" required value="{{ $user->name }}" />
                                </div>
                                <div class="form-group">
                                    <label for="apellido" class="form-label">Apellido</label>
                                    <input type="text" name="apellido" class="form-control" id="apellido" aria-describedby="Apellido"
                                        placeholder="Apellido" required value="{{ $user->apellido }}" />
                                </div>
                                <div class="form-group">
                                    <label for="password" class="form-label">{{ __('Contraseña') }}</label>

                                    
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    
                                </div>
                                <div class="form-group">
                                    <label for="facturas_dias" class="form-label">Cantidad de días para muestreo de facturas</label> <small id="emailHelp" class="form-text text-muted">(En caso de no querer limitar los días dejar en 0)    </small>                                                     
                                    <input type="text" aria-describedby="Cantidad de días para muestreo de facturas"  class="form-control" name="facturas_dias" id="facturas_dias" value="{{ $user->facturas_dias }}" >
                                </div>
                                <div class="form-group">
                                    <label for="solo_sus_fact" class="form-label">Ve solo sus facturas?</label>                   
                                    <select class="form-control" name="solo_sus_fact">
                                        <option @if($user->solo_sus_fact==1) selected @endif value="1">Si</option>
                                        <option @if($user->solo_sus_fact==0
                                            ) selected @endif value="0">No</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        @foreach($secciones as $seccion)
                                        <div class="col secNombre">
                                            <div>{{ $seccion->nombre}}</div>
                                            <ul class="list-unstyled">
                                            @foreach($roles as $rol)
                                                @if($rol->seccion == $seccion->id)
                                                <li><input @if($role_user) @foreach($role_user as $roluser)
                                                    @if($roluser->role_id == $rol->id) 
                                                     checked
                                                    @endif
                                                 @endforeach @endif type="checkbox" name="rol{{ $rol->id }}" /> {{$rol->nombre}}</li>
                                                @endif
                                            @endforeach
                                            <ul>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>    
                                <button type="submit" class="btn btn-primary" title="grabar">Modificar</button>
                               
                            </form>
                        </div>
                     
                    </div>

                   
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
@endsection

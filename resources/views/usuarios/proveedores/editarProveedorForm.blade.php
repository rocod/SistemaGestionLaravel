@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Proveedores</h1>

                    </div>
                    <div class="row">
                        <div class="col">
                            <h3 class="text-primary">Editar Proveedor</h3>
                        </div>
                        
                    </div>

                    <div class="row">

                        <div class="col-md-6 offset-md-3">
                            <form method="post" action="{{ route('editarProveedor', $proveedor)}}">
                                <div class="form-group">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input name="nombre" type="text" class="form-control" id="nombre" aria-describedby="nombre" required value="{{ old('nombre', $proveedor->nombre) }}">
                                </div>
                                <div class="form-group">
                                    <label for="cuit" class="form-label">Cuit</label>
                                    <input name="cuit" type="text" class="form-control" id="cuit" aria-describedby="cuit" value="{{ old('cuit', $proveedor->cuit) }}">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input name="email" type="text" class="form-control" id="email" aria-describedby="email" value="{{ old('email', $proveedor->email) }}">
                                </div>
                                <div class="form-group">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input name="telefono" type="text" class="form-control" id="telefono" aria-describedby="telefono" value="{{ old('telefono', $proveedor->telefono) }}">
                                </div>
                                <div class="form-group">
                                    <label for="direccion" class="form-label">Dirección</label>
                                    <textarea name="direccion" id="direccion" cols="30" rows="4" class="form-control">
                                        {{ old('direccion', $proveedor->direccion) }}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="informacion" class="form-label">Información adicional</label>
                                    <textarea name="informacion" id="informacion" cols="30" rows="4" class="form-control">
                                        {{ old('informacion', $proveedor->informacion) }}
                                    </textarea>
                                </div>
                                <button type="submit" class="btn btn-primary" title="grabar">Grabar</button>
                                @method('PUT')
                                @csrf
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
@endsection

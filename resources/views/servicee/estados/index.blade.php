@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Estados de Reparación</h1>
                    </div>

                    <div class="row">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Mensaje</th>
                                    <th scope="col">Modif.</th>
                                    <th scope="col">Elim.</th>
                                    <th scope="col">
                                    <a class="text-success" href="agregarEstadoReparacion" title="Agregar nuevo contrareembolso">
                                        <i class="fas fa-plus-circle fa-2x "></i>
                                    </a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($estados_reparacion as $estado_reparacion)
                                <tr>
                                    <td>{{ $estado_reparacion->estado }}</td>
                                    <td>{{ $estado_reparacion->mensaje }}</td>
                                    <td>
                                        <a title="Editar" class="text-info" href="{{ route('editarEstadoReparacionForm', $estado_reparacion) }}">
                                            <i class="fas fa-pencil-alt fa-2x"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a title="Eliminar" class="text-info" href="{{ route('eliminarEstadoReparacionForm', $estado_reparacion) }}">
                                            <i class="far fa-trash-alt fa-2x"></i>
                                        </a>
                                    </td> 
                                    <td></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
@endsection

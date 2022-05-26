@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Depósitos</h1>
                    </div>

                    <div class="row">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Nro cuenta</th>
                                    <th scope="col">CBU</th>
                                    <th scope="col">Banco</th>
                                    <th scope="col">Titular cuenta</th>
                                    <th scope="col">Modif.</th>
                                    <th scope="col">Elim.</th>
                                    <th scope="col">
                                    <a class="text-success" href="agregarDeposito" title="Agregar nuevo depósito">
                                        <i class="fas fa-plus-circle fa-2x "></i>
                                    </a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($depositos as $deposito)
                                <tr>
                                    <td>{{ $deposito->nombre }}</td>
                                    <td>{{ $deposito->nro_cuenta }}</td>
                                    <td>{{ $deposito->cbu }}</td>
                                    <td>{{ $deposito->banco }}</td>
                                    <td>{{ $deposito->titular }}</td>
                                    <td>
                                        <a title="Editar" class="text-info" href="{{ route('editarDepositoForm', $deposito) }}">
                                            <i class="fas fa-pencil-alt fa-2x"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a title="Eliminar" class="text-info" href="{{ route('eliminarDepositoForm', $deposito) }}">
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

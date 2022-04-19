@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Contrareembolsos</h1>
                    </div>

                    <div class="row">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Dirección</th>
                                    <th scope="col">Modif.</th>
                                    <th scope="col">Elim.</th>
                                    <th scope="col">
                                    <a class="text-success" href="agregarContrareembolso" title="Agregar nuevo contrareembolso">
                                        <i class="fas fa-plus-circle fa-2x "></i>
                                    </a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contrareembolsos as $contrarrembolso_empresa)
                                <tr>
                                    <td>{{ $contrarrembolso_empresa->nombre }}</td>
                                    <td>{{ $contrarrembolso_empresa->telefono }}</td>
                                    <td>{{ $contrarrembolso_empresa->email }}</td>
                                    <td>{{ $contrarrembolso_empresa->direccion }}</td>
                                    <td>
                                        <a title="Editar" class="text-info" href="{{ route('editarContrareembolsoForm', $contrarrembolso_empresa) }}">
                                            <i class="fas fa-pencil-alt fa-2x"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('eliminarContrareembolso', $contrarrembolso_empresa) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="far fa-trash-alt fa-2x">
                                            </button>
                                        </form>
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

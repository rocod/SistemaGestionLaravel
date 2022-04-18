@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Formas de pago</h1>
                    </div>

                    <div class="row">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Forma de pago</th>
                                    <th scope="col">Provincia</th>
                                    <th scope="col">Localidad</th>
                                    <th scope="col">Código Postal</th>
                                    <th scope="col">Dirección</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Modif.</th>
                                    <th scope="col">Elim.</th>
                                    <th scope="col">
                                    <a class="text-success" href="agregarFormaDePago" title="Agregar nueva forma de pago">
                                        <i class="fas fa-plus-circle fa-2x "></i>
                                    </a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($formas_de_pago as $forma_de_pago)
                                <tr>
                                    <td>{{ $forma_de_pago->forma_pago }}</td>
                                    <td>{{ $forma_de_pago->provincia }}</td>
                                    <td>{{ $forma_de_pago->localidad }}</td>
                                    <td>{{ $forma_de_pago->cp }}</td>
                                    <td>{{ $forma_de_pago->direccion }}</td>
                                    <td>{{ $forma_de_pago->telefono }}</td>
                                    <td>
                                        <a title="Editar" class="text-info" href="{{ route('editarFormaDePagoForm', $forma_de_pago) }}">
                                            <i class="fas fa-pencil-alt fa-2x"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('eliminarFormaDePago', $forma_de_pago) }}" method="POST">
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

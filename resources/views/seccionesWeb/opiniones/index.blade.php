@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Opiniones</h1>
                    </div>

                    <div class="row">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Puntaje</th>
                                    <th scope="col">E-mail cliente</th>
                                    <th scope="col">Opinión</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Aceptar</th>
                                    <th scope="col">Rechazar</th>
                                    <th scope="col">
                                    <a class="text-success" href="agregarOpinion" title="Agregar nueva forma de pago">
                                        <i class="fas fa-plus-circle fa-2x "></i>
                                    </a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($opiniones as $opinion)
                                <tr>
                                    <td>{{ $opinion->producto }}</td>
                                    <td>{{ $opinion->puntaje }}</td>
                                    <td>{{ $opinion->user->email }}</td>
                                    <td>{{ $opinion->get_resumen }}</td>
                                    <td>{{ $opinion->estado }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('aceptarOpinion', $opinion) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-outline-success">Aceptar</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('rechazarOpinion', $opinion) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-outline-danger">Rechazar</button>
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

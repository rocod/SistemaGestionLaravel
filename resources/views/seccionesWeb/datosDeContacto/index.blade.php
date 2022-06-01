@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Datos del Local</h1>
                    </div>

                    <div class="row">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Línea 1</th>
                                    <th scope="col">Línea 2</th>
                                    <th scope="col">Línea 3</th>
                                    <th scope="col">Modif.</th>
                                    <th scope="col">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dato1 as $dato1)
                                <h3>{{ $dato1->seccion }}</h3>
                                <tr>
                                    <td>{{ $dato1->linea1 }}</td>
                                    <td>{{ $dato1->linea2 }}</td>
                                    <td>{{ $dato1->linea3 }}</td>
                                    <td>
                                        <a title="Editar" class="text-info" href="{{ route('editarDatoDeContactoForm', $dato1) }}">
                                            <i class="fas fa-pencil-alt fa-2x"></i>
                                        </a>
                                    </td>
                                    <td></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Línea 1</th>
                                    <th scope="col">Línea 2</th>
                                    <th scope="col">Línea 3</th>
                                    <th scope="col">Línea 4</th>
                                    <th scope="col">Modif.</th>
                                    <th scope="col">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dato2 as $dato2)
                                <h3 class="mt-4">{{ $dato2->seccion }}</h3>
                                <tr>
                                    <td>{{ $dato2->linea1 }}</td>
                                    <td>{{ $dato2->linea2 }}</td>
                                    <td>{{ $dato2->linea3 }}</td>
                                    <td>{{ $dato2->linea4 }}</td>
                                    <td>
                                        <a title="Editar" class="text-info" href="{{ route('editarDatoDeContactoForm', $dato2) }}">
                                            <i class="fas fa-pencil-alt fa-2x"></i>
                                        </a>
                                    </td>
                                    <td></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Leyenda Whatsapp</th>
                                    <th scope="col">Teléfono Whatsapp</th>
                                    <th scope="col">Modif.</th>
                                    <th scope="col">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dato3 as $dato3)
                                <h3 class="mt-4">{{ $dato3->seccion }}</h3>
                                <tr>
                                    <td>{{ $dato3->linea1 }}</td>
                                    <td>{{ $dato3->linea2 }}</td>
                                    <td>
                                        <a title="Editar" class="text-info" href="{{ route('editarDatoDeContactoForm', $dato3) }}">
                                            <i class="fas fa-pencil-alt fa-2x"></i>
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

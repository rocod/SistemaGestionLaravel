@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Mailing</h1>
                    </div>

                    <div class="row">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Asunto</th>
                                    <th scope="col">Cuerpo</th>
                                    <th scope="col">Archivo Adjunto</th>
                                    <th scope="col">Posicion</th>
                                    <th scope="col">Modif.</th>
                                    <th scope="col">Elim.</th>
                                    <th scope="col">
                                    <a class="text-success" href="agregarMailing" title="Agregar nuevo mailing">
                                        <i class="fas fa-plus-circle fa-2x "></i>
                                    </a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mailings as $mailing)
                                <tr>
                                    <td>{{ $mailing->asunto }}</td>
                                    <td>{{ $mailing->cuerpo }}</td>
                                    <td>{{ $mailing->archivo_adjunto }}</td>
                                    <td>{{ $mailing->posicion }}</td>
                                    <td>
                                        <a title="Editar" class="text-info" href="{{ route('editarMailingForm', $mailing) }}">
                                            <i class="fas fa-pencil-alt fa-2x"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a title="Eliminar" class="text-info" href="{{ route('eliminarMailingForm', $mailing) }}">
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

@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Terminal Retiro</h1>
                    </div>

                    <div class="row">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Empresa</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Dirección</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Modif.</th>
                                    <th scope="col">Elim.</th>
                                    <th scope="col">
                                    <a class="text-success" href="agregarTerminalRetiro" title="Agregar nueva terminal retiro">
                                        <i class="fas fa-plus-circle fa-2x "></i>
                                    </a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($terminales_retiro as $terminal_retiro)
                                <tr>
                                    <td>{{ $terminal_retiro->nombre }}</td>
                                    <td>{{ $terminal_retiro->telefono }}</td>
                                    <td>{{ $terminal_retiro->direccion }}</td>
                                    <td>{{ $terminal_retiro->email }}</td>
                                    <td>
                                        <a title="Editar" class="text-info" href="{{ route('editarTerminalRetiroForm', $terminal_retiro) }}">
                                            <i class="fas fa-pencil-alt fa-2x"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a title="Eliminar" class="text-info" href="{{ route('eliminarTerminalRetiroForm', $terminal_retiro) }}">
                                            <i class="far fa-trash-alt fa-2x"></i>
                                        </a>
                                    </td> 
                                    {{-- <td>
                                        <form action="{{ route('eliminarTerminalRetiro', $terminal_retiro) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="far fa-trash-alt fa-2x">
                                            </button>
                                        </form>
                                    </td> --}}
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

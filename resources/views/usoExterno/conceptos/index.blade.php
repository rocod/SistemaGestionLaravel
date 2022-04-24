@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Conceptos</h1>
                        <a class="btn btn-outline-primary" href="{{ url('gastos') }}">Gastos</a>
                    </div>

                    <div class="row">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Concepto</th>
                                    <th scope="col">Modif.</th>
                                    <th scope="col">Elim.</th>
                                    <th scope="col">
                                    <a class="text-success" href="agregarConcepto" title="Agregar nuevo concepto">
                                        <i class="fas fa-plus-circle fa-2x "></i>
                                    </a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($conceptos as $concepto)
                                <tr>
                                    <td>{{ $concepto->concepto }}</td>
                                    <td>
                                        <a title="Editar" class="text-info" href="{{ route('editarConceptoForm', $concepto) }}">
                                            <i class="fas fa-pencil-alt fa-2x"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a title="Eliminar" class="text-info" href="{{ route('eliminarConceptoForm', $concepto) }}">
                                            <i class="far fa-trash-alt fa-2x"></i>
                                        </a>
                                    </td>                                 
                                    {{-- <td>
                                        <form action="{{ route('eliminarFormaDePago', $forma_de_pago) }}" method="POST">
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

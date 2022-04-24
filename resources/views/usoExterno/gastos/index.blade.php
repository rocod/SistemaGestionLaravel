@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Gastos</h1>
                            <a class="btn btn-outline-primary" href="{{ url('conceptos') }}">Conceptos</a>
                    </div>

                    <form action="{{ route('buscadorGastos') }}" method="POST">
                        @csrf
                        <br>
                        <div class="container">
                            <div class="row">
                                <div class="container-fluid">
                                    <div class="form-group row">
                                        <label for="date" class="col-form-label col-sm-2">Desde</label>
                                        <div class="col-sm-3">
                                            <input type="date" class="form-control input-sm" name="fromDate" required>
                                        </div>
                                        <label for="date" class="col-form-label col-sm-2">Hasta</label>
                                        <div class="col-sm-3">
                                            <input type="date" class="form-control input-sm" name="toDate" required>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="submit" class="btn" name="search" title="buscar">Buscar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </form>

                    <div class="row">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Monto</th>
                                    <th scope="col">Concepto</th>
                                    <th scope="col">Modif.</th>
                                    <th scope="col">Elim.</th>
                                    <th scope="col">
                                    <a class="text-success" href="agregarGasto" title="Agregar nuevo gasto">
                                        <i class="fas fa-plus-circle fa-2x "></i>
                                    </a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($gastos as $gasto)
                                <tr>
                                    <td>{{ $gasto->fecha }}</td>
                                    <td>${{ $gasto->monto }}</td>
                                    <td>{{ $gasto->id_concepto }}</td>
                                    <td>
                                        <a title="Editar" class="text-info" href="{{ route('editarGastoForm', $gasto) }}">
                                            <i class="fas fa-pencil-alt fa-2x"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a title="Eliminar" class="text-info" href="{{ route('eliminarGastoForm', $gasto) }}">
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

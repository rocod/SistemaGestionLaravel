@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Gastos</h1>
                            <a class="btn btn-outline-primary" href="{{ url('conceptos') }}">Conceptos</a>
                    </div>


                    <h5>Filtar gastos</h5>
                    <form>
                        <div class="d-flex align-items-center">
                            <div class="form-group">
                                <label for="fecha" class="form-label">Fecha desde</label>
                                <input class="form-control" type="date" name="search_one" class="rounded-md py-1 text-black">
                            </div>
                            <div class="form-group ml-2">
                                <label for="fecha" class="form-label">Fecha hasta</label>
                                <input class="form-control" type="date" name="search_two" class="rounded-md py-1 text-black">
                            </div>
                            <div class="form-group ml-2">
                                <label class="form-label">Concepto</label>
                                <select name="search">
                                    <option class="form-control" value="">Todos</option>
                                    @foreach ($conceptos as $concepto)
                                        <option class="form-control" value="{{ $concepto->id }}">{{ $concepto->concepto }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="ml-2 mt-4">
                                <button type="submit" class="btn btn-primary mb-2">Buscar</button>
                            </div>
                        </div>
                    </form>


                    <div class="row">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Monto</th>
                                    <th scope="col">Concepto</th>
                                    <th scope="col">Observaciones</th>
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
                                    <td>{{ $gasto->concepto->concepto }}</td>
                                    <td>{{ $gasto->observacion }}</td>
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

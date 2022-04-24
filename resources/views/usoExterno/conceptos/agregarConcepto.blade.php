@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Conceptos</h1>

                    </div>
                    <div class="row">
                        <div class="col">
                            <h3 class="text-primary">Agregar concepto</h3>
                        </div>
                        
                    </div>

                    <div class="row">

                        <div class="col-md-6 offset-md-3">
                            <form method="post" action="{{ route('grabarConcepto')}}">
                                <div class="form-group">
                                    <label for="concepto" class="form-label">Concepto</label>
                                    <input name="concepto" type="text" class="form-control" id="forma_de_pago" aria-describedby="concepto" required>
                                </div>
                                <button type="submit" class="btn btn-primary" title="grabar">Grabar</button>
                                @csrf
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
@endsection

@extends('layouts.interior')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Opiniones</h1>

                    </div>
                    <div class="row">
                        <div class="col">
                            <h3 class="text-primary">Agregar opinión</h3>
                        </div>
                        
                    </div>

                    <div class="row">

                        <div class="col-md-6 offset-md-3">
                            <form method="post" action="{{ route('grabarOpinion')}}">
                                <div class="form-group">
                                    <label for="producto" class="form-label">Selecionar producto</label>
                                    <input name="producto" type="text" class="form-control" id="producto" aria-describedby="producto" required>
                                </div>
                                <div class="form-group">
                                    <label for="puntaje" class="form-label">puntaje</label>
                                    <input name="puntaje" type="number" class="form-control" id="puntaje" aria-describedby="puntaje" required>
                                </div>
                                <div class="form-group">
                                    <label for="opinion" class="form-label">Opinion</label>
                                    <textarea name="opinion" class="form-control" id="opinion" cols="6" rows="10" aria-describedby="opinion" required></textarea>
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

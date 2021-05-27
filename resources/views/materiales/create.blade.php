@extends('layouts.app', ['activePage' => 'materiales', 'titlePage' => __('Materia Prima')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">storefront</i>
                        </div>
                        <h4 class="card-title">Agregar Materia Prima</h4>
                    </div>
                    <form method="POST" action="{{ route('raw.store') }}">
                        <div class="card-body ">
                            @csrf
                            <div class="row">
                                <div class="form-group bmd-form-group col-md-6">
                                    <label for="mat_nombre" class="bmd-label-floating">Nombre</label>
                                    <input type="text" class="form-control" id="mat_nombre" name="mat_nombre">
                                </div>
                                <div class="form-group bmd-form-group col-md-6">
                                    <label for="mat_cantidad" class="bmd-label-floating">Cantidad</label>
                                    <input type="number" class="form-control" id="mat_cantidad" name="mat_cantidad">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <a href="{{ route('raw.index') }}"><button type="button" class="btn btn-fill btn-default">Cancelar</button></a>
                            <button type="submit" class="btn btn-fill btn-info">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

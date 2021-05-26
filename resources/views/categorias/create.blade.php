@extends('layouts.app', ['activePage' => 'categoria', 'titlePage' => __('Crear Categoría')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">control_point_duplicate</i>
                        </div>
                        <h4 class="card-title">Agregar Categoría</h4>
                    </div>
                    <form method="POST" action="{{ route('categoria.store') }}">
                        <div class="card-body ">
                            @csrf
                            <div class="row">
                                <div class="form-group bmd-form-group col-md-12">
                                    <label for="mat_nombre" class="bmd-label-floating">Nombre</label>
                                    <input type="text" class="form-control" id="mat_nombre" name="cat_nombre">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <a href="{{ route('raw.index') }}"><button type="button" class="btn btn-fill btn-default">Cancelar</button></a>
                            <button type="submit" class="btn btn-fill btn-rose">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

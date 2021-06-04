@extends('layouts.app', ['activePage' => 'categoria', 'titlePage' => __('Crear Categoría')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">category</i>
                        </div>
                        <h4 class="card-title">Agregar Categoría</h4>
                    </div>
                    <form method="POST" action="{{ route('categoria.store') }}" autocomplete="off">
                        <div class="card-body ">
                            @csrf
                            <div class="row">
                                <div class="form-group bmd-form-group col-md-12">
                                    <label for="mat_nombre" class="bmd-label-floating">Nombre</label>
                                    <input type="text" class="form-control" id="cat_nombre" name="cat_nombre">
                                    @include('alerts.feedback', ['field' => 'cat_nombre'])
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <a href="{{ route('categoria.index') }}"><button type="button" class="btn btn-fill btn-default">Cancelar</button></a>
                            <button type="submit" class="btn btn-fill btn-info">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

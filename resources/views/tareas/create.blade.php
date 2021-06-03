@extends('layouts.app', ['activePage' => 'tareas', 'titlePage' => __('Tareas')])

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
                        <h4 class="card-title">Agregar Tareas</h4>
                    </div>
                    <form method="POST" action="{{ route('tarea.store') }}">
                        <div class="card-body ">
                            @csrf
                            <div class="row">
                                <div class="form-group bmd-form-group col-md-6">
                                    <label for="tar_nombre" class="bmd-label-floating">Nombre</label>
                                    <input type="text" class="form-control" id="tar_nombre" name="tar_nombre">
                                </div>
                                <div class="form-group bmd-form-group col-md-6">
                                    <label for="tar_limit_date" class="bmd-label-floating">F. Finalización</label>
                                    <input type="date" class="form-control" id="tar_limit_date" name="tar_limit_date">
                                </div>
                                <div class="form-group bmd-form-group col-md-12">
                                    <label for="tar_desc" class="bmd-label-floating">Descripción</label>
                                    <textarea class="form-control" id="tar_desc" name="tar_desc"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <a href="{{ route('tarea.index') }}"><button type="button" class="btn btn-fill btn-default">Cancelar</button></a>
                            <button type="submit" class="btn btn-fill btn-info">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

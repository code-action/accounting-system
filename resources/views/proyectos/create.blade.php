@extends('layouts.app', ['activePage' => 'proyecto', 'titlePage' => __('Generar Proyecto')])

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
                        <h4 class="card-title"><b>Datos del proyecto</b> <span class="float-right">(Paso 1 de 3)</span></h4>
                    </div>
                    <form method="POST" action="{{ route('proyecto.store') }}" autocomplete="off">
                        <div class="card-body ">
                            @csrf
                            <div class="row">
                                <div class="form-group bmd-form-group col-md-6">
                                    <label for="proy_nombre" class="bmd-label-floating">Nombre</label>
                                    <input type="text" class="form-control" id="proy_nombre" name="proy_nombre">
                                    @include('alerts.feedback', ['field' => 'proy_nombre'])
                                </div>
                                <div class="form-group bmd-form-group col-md-12">
                                    <label for="proy_desc" class="bmd-label-floating">Descripción</label>
                                    <input type="text" class="form-control" id="proy_desc" name="proy_desc">
                                    @include('alerts.feedback', ['field' => 'proy_desc'])
                                </div>
                                <div class="mb-2 bmd-form-group col-md-12">
                                    <select name="cliente_id" id="cliente_id" class="form-control">
                                        <option selected disabled>Seleccione...</option>
                                        @foreach($clientes as $c)
                                            <option>{{ $c->cli_nombre }}</option>
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'cat_nombre'])
                                </div>
                                <div class="form-group bmd-form-group col-md-6">
                                    <label for="proy_finalizacion" class="bmd-label-floating">Fecha ejecución</label>
                                    <input type="date" class="form-control" id="proy_finalizacion" name="proy_finalizacion">
                                    @include('alerts.feedback', ['field' => 'proy_finalizacion'])
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <a href="{{ route('proyecto.index') }}"><button type="button" class="btn btn-fill btn-default">Cancelar</button></a>
                            <button type="submit" class="btn btn-fill btn-rose">Continuar -></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

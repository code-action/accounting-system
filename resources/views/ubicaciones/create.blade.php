@extends('layouts.app', ['activePage' => 'ubicacion', 'titlePage' => __('Crear Ubicación')])

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
                        <h4 class="card-title">Agregar Ubicación</h4>
                    </div>
                    <form method="POST" action="{{ route('ubicacion.store') }}">
                        <div class="card-body ">
                            @csrf
                            <div class="row">
                                <div class="form-group bmd-form-group col-md-6">
                                    <label for="ubi_lat" class="bmd-label-floating">Latitud</label>
                                    <input type="text" class="form-control" id="ubi_lat" name="ubi_lat">
                                </div>
                                <div class="form-group bmd-form-group col-md-6">
                                    <label for="ubi_long" class="bmd-label-floating">Longitud</label>
                                    <input type="text" class="form-control" id="ubi_long" name="ubi_long">
                                </div>
                                <div class="form-group bmd-form-group col-md-6">
                                    <select class="form-control selectpicker" data-style="btn btn-link" id="" name="ubi_estado">
                                        <option value="" selected disabled><b>Estado</b></option>
                                        <option value="0">Borrador*</option>
                                        <option value="1">Vigente</option>
                                        <option value="2">Finalizado</option>
                                        <option value="3">Cancelado</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <a href="{{ route('ubicacion.index') }}"><button type="button" class="btn btn-fill btn-default">Cancelar</button></a>
                            <button type="submit" class="btn btn-fill btn-rose">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

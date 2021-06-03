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
                    <form method="POST" action="{{ route('ubicacion.update', $ubicacion->id) }}">
                        <div class="card-body ">
                            @csrf
                            @method("PATCH")
                            <div class="row">
                                <div class="form-group bmd-form-group col-md-6">
                                    <label for="ubi_lat" class="bmd-label-floating">Latitud</label>
                                    <input value="{{ $ubicacion->ubi_lat }}" type="text" class="form-control" id="ubi_lat" name="ubi_lat">
                                </div>
                                <div class="form-group bmd-form-group col-md-6">
                                    <label for="ubi_long" class="bmd-label-floating">Longitud</label>
                                    <input value="{{ $ubicacion->ubi_long }}" type="text" class="form-control" id="ubi_long" name="ubi_long">
                                </div>
                                <div class="form-group bmd-form-group col-md-6">
                                    <select class="form-control selectpicker" data-style="btn btn-link" id="" name="ubi_estado">
                                        <option value="" selected disabled><b>Estado</b></option>
                                        <option {{ $ubicacion->ubi_estado == 0 ? 'selected' : '' }} value="0">Borrador*</option>
                                        <option {{ $ubicacion->ubi_estado == 1 ? 'selected' : '' }} value="1">Vigente</option>
                                        <option {{ $ubicacion->ubi_estado == 2 ? 'selected' : '' }} value="2">Finalizado</option>
                                        <option {{ $ubicacion->ubi_estado == 3 ? 'selected' : '' }} value="3">Cancelado</option>
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

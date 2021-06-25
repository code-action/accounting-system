@extends('layouts.app', ['activePage' => 'categoria', 'titlePage' => __('Unidad de Medida')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">insert_chart_outlined</i>
                        </div>
                        <h4 class="card-title">Editar Unidad de Medida</h4>
                    </div>
                    <form method="POST" action="{{ route('medida.update',$medida->id) }}" autocomplete="off">
                        <div class="card-body ">
                            @csrf
                            @method('put')
                            <input type="hidden" name="id_validate" value="{{$medida->id}}">
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
                                <div class="col-sm-7">
                                  <div class="form-group{{ $errors->has('med_nombre') ? ' has-danger' : '' }}">
                                    <input class="form-control{{ $errors->has('med_nombre') ? ' is-invalid' : '' }}" name="med_nombre" id="input-med_nombre" type="text" placeholder="{{ __('Nombre') }}" value="{{ $medida->med_nombre }}" aria-required="true"/>
                                    @include('alerts.feedback', ['field' => 'med_nombre'])
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Abreviatura') }}</label>
                                <div class="col-sm-7">
                                  <div class="form-group{{ $errors->has('med_abreviatura') ? ' has-danger' : '' }}">
                                    <input class="form-control{{ $errors->has('med_abreviatura') ? ' is-invalid' : '' }}" name="med_abreviatura" id="input-med_abreviatura" type="text" placeholder="{{ __('Abreviatura') }}" value="{{ $medida->med_abreviatura }}" aria-required="true"/>
                                    @include('alerts.feedback', ['field' => 'med_abreviatura'])
                                  </div>
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

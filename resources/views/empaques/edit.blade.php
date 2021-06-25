@extends('layouts.app', ['activePage' => 'empaque', 'titlePage' => __('Editar Empaque')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card ">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">person</i>
                            </div>
                            <h4 class="card-title">{{ __('Editar Empaque') }}</h4>
                        </div>
                        <form method="post" action="{{ route('empaque.update', $empaque) }}" autocomplete="off">
                            <div class="card-body ">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('emp_nombre') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('emp_nombre') ? ' is-invalid' : '' }}"
                                                   name="emp_nombre" id="input-nombre" type="text" .
                                                   placeholder="{{ __('Nombre') }}" value="{{old('emp_nombre', $empaque->emp_nombre)}}"
                                                   aria-required="true"/>
                                            @include('alerts.feedback', ['field' => 'emp_nombre'])
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <a href="{{ route('empaque.index') }}"><button type="button" class="btn btn-fill btn-default">Cancelar</button></a>
                                <button type="submit" class="btn btn-fill btn-info">Agregar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

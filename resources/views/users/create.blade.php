@extends('layouts.app', ['activePage' => 'producto', 'titlePage' => __('Crear Producto')])

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
                        <h4 class="card-title">Agregar Usuario</h4>
                    </div>
                    <form method="POST" action="{{ route('user.store') }}" autocomplete="off">
                        <div class="card-body ">
                            @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="form-label label-top">{{ __('Nombre') }}</label>
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Nombre') }}" value="{{ old('name') }}" aria-required="true"/>
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label class="form-label label-top">{{ __('Correo') }}</label>
                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="text" placeholder="{{ __('Correo') }}" value="{{ old('email') }}" aria-required="true"/>
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <a href="{{ route('user.index') }}"><button type="button" class="btn btn-fill btn-default">Cancelar</button></a>
                            <button type="submit" class="btn btn-fill btn-info">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

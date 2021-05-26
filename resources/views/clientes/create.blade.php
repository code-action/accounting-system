@extends('layouts.app', ['activePage' => 'cliente', 'titlePage' => __('Crear Cliente')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('cliente.store') }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('post')

                        <div class="card ">
                            <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">groups</i>
                                </div>
                                <h4 class="card-title">{{ __('Nuevo Cliente') }}</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('cliente.index') }}" class="btn btn-sm btn-info">{{ __('Regresar') }}</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('cli_nombre') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('cli_nombre') ? ' is-invalid' : '' }}"
                                                   name="cli_nombre" id="input-cli_nombre" type="text"
                                                   placeholder="{{ __('Nombre') }}" value="{{ old('cli_nombre') }}"
                                                   aria-required="true"/>
                                            @include('alerts.feedback', ['field' => 'cli_nombre'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Nombre Contacto') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('cli_contacto') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('cli_contacto') ? ' is-invalid' : '' }}"
                                                   name="cli_contacto" id="input-cli_contacto" type="text"
                                                   placeholder="{{ __('Nombre Contacto') }}" value="{{ old('cli_contacto') }}"
                                                   aria-required="true"/>
                                            @include('alerts.feedback', ['field' => 'cli_contacto'])
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('cli_email') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('cli_email') ? ' is-invalid' : '' }}"
                                                   name="cli_email" id="input-cli_email" type="text"
                                                   placeholder="{{ __('Email') }}" value="{{ old('cli_email') }}"
                                                   aria-required="true"/>
                                            @include('alerts.feedback', ['field' => 'cli_email'])
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Teléfono') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('cli_telefono') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('cli_telefono') ? ' is-invalid' : '' }}"
                                                   name="cli_telefono" id="input-cli_telefono" type="text"
                                                   placeholder="{{ __('Teléfono') }}" value="{{ old('cli_telefono') }}"
                                                   aria-required="true"/>
                                            @include('alerts.feedback', ['field' => 'cli_telefono'])
                                        </div>
                                    </div>
                                </div>


                            </div>


                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-info">{{ __('Guardar') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

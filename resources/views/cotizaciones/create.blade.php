@extends('layouts.app', ['activePage' => 'cotizacion', 'titlePage' => __('Cotizaciones')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('cotizacion.store') }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('post')

                        <div class="card ">
                            <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">groups</i>
                                </div>
                                <h4 class="card-title">{{ __('Nueva Cotización') }}</h4>
                            </div>
                            <div class="card-body ">

                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('cotizacion.index') }}" class="btn btn-sm btn-info">{{ __('Regresar') }}</a>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Cliente') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('cli_nombre') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('cli_nombre') ? ' is-invalid' : '' }}"
                                                   name="cli_nombre" id="input-cli_nombre" type="text"
                                                   placeholder="{{ __('Cliente') }}" value="{{ old('cli_nombre') }}"
                                                   aria-required="true"/>
                                            @include('alerts.feedback', ['field' => 'cli_nombre'])
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Cliente') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('cli_nombre') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('cli_nombre') ? ' is-invalid' : '' }}"
                                                   name="cli_nombre" id="input-cli_nombre" type="text"
                                                   placeholder="{{ __('Cliente') }}" value="{{ old('cli_nombre') }}"
                                                   aria-required="true"/>
                                            @include('alerts.feedback', ['field' => 'cli_nombre'])
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

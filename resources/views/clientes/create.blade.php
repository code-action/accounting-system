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
                                    <i class="material-icons">contact_phone</i>
                                </div>
                                <h4 class="card-title">{{ __('Nuevo Cliente') }}</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('cliente.index') }}" class="btn btn-sm btn-info">{{ __('Regresar') }}</a>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-5">
                                        <div class="row ">
                                            <label class="col-sm-3 col-md-3 col-lg-2 col-form-label">{{ __('Nombre') }}</label>
                                            <div class="col-sm-10">
                                                <div class="form-group{{ $errors->has('cli_nombre') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('cli_nombre') ? ' is-invalid' : '' }}"
                                                           name="cli_nombre" id="input-cli_nombre" type="text"
                                                           placeholder="{{ __('Nombre del cliente o negocio') }}" value="{{ old('cli_nombre') }}"
                                                           aria-required="true"/>
                                                    @include('alerts.feedback', ['field' => 'cli_nombre'])
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-md-3 col-lg-2 col-form-label">{{ __('Contacto') }}</label>
                                            <div class="col-sm-10">
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
                                            <label class="col-sm-3 col-md-3 col-lg-2 col-form-label">{{ __('Email') }}</label>
                                            <div class="col-sm-10">
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
                                            <label class="col-sm-3 col-md-3 col-lg-2 col-form-label">{{ __('Teléfono') }}</label>
                                            <div class="col-sm-10">
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
                                    <div class="col-md-5">

                                        <div class="row">
                                            <label class="col-sm-3 col-md-3 col-lg-2 col-form-label">{{ __('Categoría') }}</label>
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <select class="js-example-basic-single js-states has-error
                                                                form-control" name="cli_categoria" id="input-cli_categoria"
                                                            data-style="select-with-transition" title=""
                                                            data-size="100" style="width: 100%">
                                                        <option value="" disabled selected
                                                                style="background-color:lightgray">
                                                            {{__('Seleccione una categoría de contribuyente')}}
                                                        </option>
                                                        <option value="1">Gran contribuyente</option>
                                                        <option value="2">Mediano contribuyente</option>
                                                        <option value="3">Otros contribuyentes</option>
                                                    </select>
                                                    @include('alerts.feedback', ['field' => 'cli_categoria'])
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <label class="col-sm-3 col-md-3 col-lg-2 col-form-label">{{ __('Dirección') }}</label>
                                            <div class="col-sm-10">
                                                <div class="form-group{{ $errors->has('cli_direccion') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('cli_direccion') ? ' is-invalid' : '' }}"
                                                           name="cli_direccion" id="input-cli_direccion" type="text"
                                                           placeholder="{{ __('Dirección') }}" value="{{ old('cli_direccion') }}"
                                                           aria-required="true"/>
                                                    @include('alerts.feedback', ['field' => 'cli_direccion'])
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-md-3 col-lg-2 col-form-label">{{ __('DUI') }}</label>
                                            <div class="col-sm-10">
                                                <div class="form-group{{ $errors->has('cli_dui') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('cli_contacto') ? ' is-invalid' : '' }}"
                                                           name="cli_dui" id="input-cli_dui" type="text"
                                                           placeholder="{{ __('Documento Único de Identidad (Opcional)') }}" value="{{ old('cli_dui') }}"
                                                           aria-required="true"/>
                                                    @include('alerts.feedback', ['field' => 'cli_dui'])
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="col-sm-3 col-md-3 col-lg-2 col-form-label">{{ __('NIT') }}</label>
                                            <div class="col-sm-10">
                                                <div class="form-group{{ $errors->has('cli_nit') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('cli_nit') ? ' is-invalid' : '' }}"
                                                           name="cli_nit" id="input-cli_nit" type="text"
                                                           placeholder="{{ __('Número de Identificación Tributaria') }}"
                                                           value="{{ old('cli_nit') }}"
                                                           aria-required="true"/>
                                                    @include('alerts.feedback', ['field' => 'cli_nit'])
                                                </div>
                                            </div>
                                        </div>
                                        {{ old('cli_nrc') }}
                                        <div class="row">
                                            <label class="col-sm-3 col-md-3 col-lg-2 col-form-label">{{ __('NRC') }}</label>
                                            <div class="col-sm-10">
                                                <div class="form-group{{ $errors->has('cli_nrc') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('cli_nrc') ? ' is-invalid' : '' }}"
                                                           name="cli_nrc" id="input-cli_nit" type="text"
                                                           placeholder="{{ __('Número de Registro de Contribuyente') }}"
                                                           value="{{ old('cli_nrc') }}"
                                                           aria-required="true"/>
                                                    @include('alerts.feedback', ['field' => 'cli_nrc'])
                                                </div>
                                            </div>
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
@push('js')


    <script>
        $("#input-cli_categoria").select2({
            language: {
                noResults: function() {
                    return "{{__('Resultado no encontrado')}}";
                },
                searching: function() {
                    return "{{__('Buscando')}}...";
                }
            },
            placeholder: 'Seleccione una categoría de contribuyente',
            minimumResultsForSearch: Infinity
        })
    </script>

@endpush

@extends('layouts.app', ['activePage' => 'cliente', 'titlePage' => __('Clientes')])

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
                                <div class="row ">
                                    <div class="col-md-5">
                                        <div class="row ">
                                            <div class="col-sm-12">
                                                <label class="form-label label-top">{{ __('Nombre') }}</label>
                                                <input class="form-control{{ $errors->has('cli_nombre') ? ' is-invalid' : '' }}"
                                                        name="cli_nombre" id="input-cli_nombre" type="text"
                                                        placeholder="{{ __('Nombre del cliente o negocio') }}" value="{{ old('cli_nombre') }}"
                                                        aria-required="true"/>
                                                @include('alerts.feedback', ['field' => 'cli_nombre'])
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label class="form-label label-top">{{ __('Contacto') }}</label>
                                                <input class="form-control{{ $errors->has('cli_contacto') ? ' is-invalid' : '' }}"
                                                        name="cli_contacto" id="input-cli_contacto" type="text"
                                                        placeholder="{{ __('Nombre Contacto') }}" value="{{ old('cli_contacto') }}"
                                                        aria-required="true"/>
                                                @include('alerts.feedback', ['field' => 'cli_contacto'])
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label class="form-label label-top">{{ __('Email') }}</label>
                                                <input class="form-control{{ $errors->has('cli_email') ? ' is-invalid' : '' }}"
                                                        name="cli_email" id="input-cli_email" type="text"
                                                        placeholder="{{ __('Email') }}" value="{{ old('cli_email') }}"
                                                        aria-required="true"/>
                                                @include('alerts.feedback', ['field' => 'cli_email'])
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label class="form-label label-top">{{ __('Tel??fono') }}</label>
                                                <input class="form-control{{ $errors->has('cli_telefono') ? ' is-invalid' : '' }}"
                                                        name="cli_telefono" id="input-cli_telefono" type="text"
                                                        placeholder="{{ __('Tel??fono') }}" value="{{ old('cli_telefono') }}"
                                                        aria-required="true"/>
                                                @include('alerts.feedback', ['field' => 'cli_telefono'])
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="col-sm-12">
                                            <label class="form-label label-top">{{ __('Direcci??n') }}</label>
                                                <textarea class="form-control{{ $errors->has('cli_direccion') ? ' is-invalid' : '' }}"
                                                        name="cli_direccion" id="input-cli_direccion" type="text"
                                                        placeholder="{{ __('Direcci??n') }}"
                                                        aria-required="true">{{old('cli_direccion') }}</textarea>
                                                @include('alerts.feedback', ['field' => 'cli_direccion'])
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-md-5">

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label class="form-label label-top-select">{{ __('Categor??a') }}</label>
                                                <select class="js-example-basic-single js-states has-error
                                                            form-control" name="cli_categoria" id="input-cli_categoria"
                                                        data-style="select-with-transition" title=""
                                                        data-size="100" style="width: 100%">
                                                    <option value="" disabled selected
                                                            style="background-color:lightgray">
                                                        {{__('Seleccione una categor??a de contribuyente')}}
                                                    </option>
                                                    <option value="1">Gran Contribuyente</option>
                                                    <option value="2">Mediano Contribuyente</option>
                                                    <option value="3">Otros Contribuyentes</option>

                                                </select>
                                                @include('alerts.feedback', ['field' => 'cli_categoria'])
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label class="form-label label-top">{{ __('DUI') }}</label>
                                                <input class="form-control{{ $errors->has('cli_contacto') ? ' is-invalid' : '' }}"
                                                        name="cli_dui" id="input-cli_dui" type="text"
                                                        placeholder="{{ __('Documento ??nico de Identidad (Opcional)') }}"
                                                        value="{{ old('cli_dui') }}"
                                                        aria-required="true"/>
                                                @include('alerts.feedback', ['field' => 'cli_dui'])
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                            <label class="form-label label-top">{{ __('NIT') }}</label>
                                                <input class="form-control{{ $errors->has('cli_nit') ? ' is-invalid' : '' }}"
                                                        name="cli_nit" id="input-cli_nit" type="text"
                                                        placeholder="{{ __('N??mero de Identificaci??n Tributaria') }}"
                                                        value="{{ old('cli_nit') }}"
                                                        aria-required="true"/>
                                                @include('alerts.feedback', ['field' => 'cli_nit'])
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label class="form-label label-top">{{ __('NRC') }}</label>
                                                <input class="form-control{{ $errors->has('cli_nrc') ? ' is-invalid' : '' }}"
                                                        name="cli_nrc" id="input-cli_nrc" type="text"
                                                        placeholder="{{ __('N??mero de Registro de Contribuyente') }}"
                                                        value="{{ old('cli_nrc') }}"
                                                        aria-required="true"/>
                                                @include('alerts.feedback', ['field' => 'cli_nrc'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <a href="{{ route('cliente.index') }}"><button type="button" class="btn btn-fill btn-default">Cancelar</button></a>
                                <button type="submit" class="btn btn-fill btn-info">Agregar</button>
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
            placeholder: 'Seleccione una categor??a de contribuyente',
            minimumResultsForSearch: Infinity
        })
    </script>
    <script>
        // Uso de mascaras en los campos
        $(document).ready(function(){
            $('#input-cli_telefono').mask('0000-0000');
            $('#input-cli_dui').mask('00000000-0');
            $('#input-cli_nit').mask('0000-000000-000-0');
            $('#input-cli_nrc').mask('000000');

        });
    </script>

@endpush

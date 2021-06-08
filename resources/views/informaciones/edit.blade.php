@extends('layouts.app', ['activePage' => 'categoria', 'titlePage' => __('Editar Información General')])

@section('content')
{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Error</strong> Hemos encontrado estos problemas<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">settings_suggest</i>
                        </div>
                        <h4 class="card-title">Información General</h4>
                    </div>
                    <form method="POST" action="{{ route('informacion.update',1) }}" autocomplete="off">
                        <div class="card-body mt-4">
                            @csrf
                            @method('put')
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
                                <div class="col-sm-10">
                                  <div class="form-group{{ $errors->has('info_nombre') ? ' has-danger' : '' }}">
                                    <input class="form-control{{ $errors->has('info_nombre') ? ' is-invalid' : '' }}" name="info_nombre" id="input-info_nombre" type="text" placeholder="{{ __('Nombre') }}" value="{{$info->info_nombre}}" aria-required="true"/>
                                    @include('alerts.feedback', ['field' => 'info_nombre'])
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Dirección') }}</label>
                                <div class="col-sm-10">
                                    <div class="form-group{{ $errors->has('info_direccion') ? ' has-danger' : '' }}">
                                        <textarea class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="info_direccion" id="info_direccion" cols="0" rows="4">{{$info->info_direccion}}</textarea>
                                        @include('alerts.feedback', ['field' => 'info_direccion'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Teléfono') }}</label>
                                <div class="col-sm-10">
                                    <div class="form-group{{ $errors->has('info_telefono') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('info_telefono') ? ' is-invalid' : '' }}" name="info_telefono" id="info_telefono" type="text" placeholder="{{ __('teléfono') }}" value="{{$info->info_telefono}}"/>
                                        @include('alerts.feedback', ['field' => 'info_telefono'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Fax') }}</label>
                                <div class="col-sm-10">
                                    <div class="form-group{{ $errors->has('info_fax') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('info_fax') ? ' is-invalid' : '' }}" name="info_fax" id="info_fax" type="text" placeholder="{{ __('fax') }}" value="{{$info->info_fax}}"/>
                                        @include('alerts.feedback', ['field' => 'info_fax'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Correo') }}</label>
                                <div class="col-sm-10">
                                    <div class="form-group{{ $errors->has('info_correo') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('info_correo') ? ' is-invalid' : '' }}" name="info_correo" id="info_correo" type="text" placeholder="{{ __('correo') }}" value="{{$info->info_correo}}"/>
                                        @include('alerts.feedback', ['field' => 'info_correo'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('NIT') }}</label>
                                <div class="col-sm-10">
                                    <div class="form-group{{ $errors->has('info_nit') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('info_nit') ? ' is-invalid' : '' }}" name="info_nit" id="info_nit" type="text" placeholder="{{ __('Número de Identificación Tributaria') }}" value="{{$info->info_nit}}"/>
                                        @include('alerts.feedback', ['field' => 'info_nit'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('NRC') }}</label>
                                <div class="col-sm-10">
                                    <div class="form-group{{ $errors->has('info_nrc') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('info_nrc') ? ' is-invalid' : '' }}" name="info_nrc" id="info_nrc" type="text" placeholder="{{ __('Número de Registro de Contribuyente') }}" value="{{$info->info_nrc}}"/>
                                        @include('alerts.feedback', ['field' => 'info_nrc'])
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <a href="{{ url('home') }}"><button type="button" class="btn btn-fill btn-default">Cancelar</button></a>
                            <button type="submit" class="btn btn-fill btn-info">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
    <script>
        // Uso de mascaras en los campos
        $(document).ready(function(){
            $('#info_telefono').mask('0000-0000');
            $('#info_fax').mask('0000-0000');
            $('#info_nit').mask('0000-000000-000-0');
            $('#info_nrc').mask('000000');
        });
    </script>
@endpush

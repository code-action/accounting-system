@extends('layouts.app', ['activePage' => 'proveedor', 'titlePage' => __('Proveedores')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7">
                    <form method="post" action="{{ route('proveedor.update', $proveedor) }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('put')

                        <div class="card ">
                            <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">groups</i>
                                </div>
                                <h4 class="card-title">{{ __('Editar Proveedor') }}</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="form-label label-top">{{ __('Nombre') }}</label>
                                        <input class="form-control{{ $errors->has('prov_nombre') ? ' is-invalid' : '' }}" name="prov_nombre" id="input-prov_nombre" type="text" placeholder="{{ __('Nombre') }}" value="{{ old('prov_nombre',$proveedor->prov_nombre) }}" aria-required="true"/>
                                        @include('alerts.feedback', ['field' => 'prov_nombre'])
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="form-label label-top">{{ __('Encargado') }}</label>
                                        <input class="form-control{{ $errors->has('prov_encargado') ? ' is-invalid' : '' }}" name="prov_encargado" id="input-prov_encargado" type="text" placeholder="{{ __('Encargado') }}" value="{{ old('prov_encargado',$proveedor->prov_encargado) }}" aria-required="true"/>
                                        @include('alerts.feedback', ['field' => 'prov_encargado'])
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="form-label label-top">{{ __('Teléfono') }}</label>
                                        <input class="form-control{{ $errors->has('prov_telefono') ? ' is-invalid' : '' }}" name="prov_telefono" id="input-prov_telefono" type="text" placeholder="{{ __('Teléfono') }}" value="{{ old('prov_telefono',$proveedor->prov_telefono) }}" aria-required="true"/>
                                        @include('alerts.feedback', ['field' => 'prov_telefono'])
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="form-label label-top">{{ __('Email') }}</label>
                                        <input class="form-control{{ $errors->has('prov_email') ? ' is-invalid' : '' }}" name="prov_email" id="input-prov_email" type="text" placeholder="{{ __('Email') }}" value="{{ old('prov_email',$proveedor->prov_email) }}" aria-required="true"/>
                                        @include('alerts.feedback', ['field' => 'prov_email'])
                                    </div>
                                </div>

                                <input type="hidden" name="id_validate" value="{{$proveedor->id}}">

                            </div>
                            <div class="card-footer ">
                                <a href="{{ route('proveedor.index') }}"><button type="button" class="btn btn-fill btn-default">Cancelar</button></a>
                                <button type="submit" class="btn btn-fill btn-info">Guardar</button>
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
        // Uso de mascaras en los campos
        $(document).ready(function(){
            $('#input-prov_telefono').mask('0000-0000');
        });
    </script>
@endpush
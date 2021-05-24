{{--<h3>Editar cliente</h3>
<form action="{{route('cliente.update', $cliente)}}" method="POST">
    @csrf
    @method('PUT')

    <label for="nombre">{{ __('Nombre') }}<br>
        <input type="text" id="nombre" name="nombre" value="{{old('nombre', $cliente->cli_nombre)}}"><br>
    </label>
    @error('nombre')
        <small>{{$message}}</small>
    @enderror <br>

    <label for="email">{{ __('Email') }}<br>
        <input type="email" id="email" name="email" value="{{old('email', $cliente->cli_email)}}"><br>
    </label>
    @error('email')
        <small>{{$message}}</small>
    @enderror <br>

    <label for="contacto">{{ __('Contacto') }}<br>
        <input type="text" id="contacto" name="contacto" value="{{old('contacto', $cliente->cli_contacto)}}"><br>
    </label>
    @error('contacto')
        <small>{{$message}}</small>
    @enderror <br><br>

    <button type="submit">{{ __('Guardar') }}</button>
    <a href="{{route('cliente.index')}}">{{ __('Cancelar') }}</a>
</form>--}}


@extends('layouts.app', ['activePage' => 'cliente', 'titlePage' => __('Clientes')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post"  action="{{route('cliente.update', $cliente)}}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('put')

                        <div class="card ">
                            <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">groups</i>
                                </div>
                                <h4 class="card-title">{{ __('Editar Cliente') }}</h4>
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
                                                   placeholder="{{ __('Nombre') }}" value="{{old('cli_nombre', $cliente->cli_nombre)}}"
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
                                                   placeholder="{{ __('Nombre Contacto') }}" value="{{old('cli_contacto', $cliente->cli_contacto)}}"
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
                                                   placeholder="{{ __('Email') }}" value="{{old('cli_email', $cliente->cli_email)}}"
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
                                                   placeholder="{{ __('Teléfono') }}" value="{{old('cli_telefono', $cliente->cli_telefono)}}"
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

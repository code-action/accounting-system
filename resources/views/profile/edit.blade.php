@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('Perfil de usuario')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7">
                    <form method="post" action="{{ route('profile.update') }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('put')

                        <div class="card ">
                            <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">person</i>
                                </div>
                                <h4 class="card-title">Editar Información</h4>
                            </div>
                            <div class="card-body ">
                                @if (session('status'))
                                <div class="row">
                                    <div class="col-sm-12">
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="material-icons">close</i>
                                        </button>
                                        <span>{{ session('status') }}</span>
                                    </div>
                                    </div>
                                </div>
                                @endif
                                <div class="row">
                                <div class="col-sm-12">
                                    <label class="form-label label-top">{{ __('Nombre') }}</label>
                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Nombre') }}" value="{{ old('name', auth()->user()->name) }}" aria-required="true"/>
                                    @if ($errors->has('name'))
                                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-12">
                                    <label class="form-label label-top">{{ __('Correo') }}</label>
                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Correo') }}" value="{{ old('email', auth()->user()->email) }}"/>
                                    @if ($errors->has('email'))
                                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                                    @endif
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
            <div class="row">
                <div class="col-md-7">
                <form method="post" action="{{ route('profile.password') }}" class="form-horizontal">
                    @csrf
                    @method('put')

                    <div class="card ">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">vpn_key</i>
                        </div>
                        <h4 class="card-title">Editar Contraseña</h4>
                    </div>
                    <div class="card-body ">
                        @if (session('status_password'))
                        <div class="row">
                            <div class="col-sm-12">
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="material-icons">close</i>
                                </button>
                                <span>{{ session('status_password') }}</span>
                            </div>
                            </div>
                        </div>
                        @endif
                        <div class="row">
                        <div class="col-sm-12">
                            <label class="form-label label-top" for="input-current-password">{{ __('Contraseña actual') }}</label>
                            <input class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" input type="password" name="old_password" id="input-current-password" placeholder="{{ __('Contraseña actual') }}" value="" required />
                            @if ($errors->has('old_password'))
                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('old_password') }}</span>
                            @endif
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-12">
                            <label class="form-label label-top" for="input-password">{{ __('Contraseña nueva') }}</label>
                            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="input-password" type="password" placeholder="{{ __('Contraseña nueva') }}" value="" required />
                            @if ($errors->has('password'))
                                <span id="password-error" class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-12">
                            <label class="form-label label-top" for="input-password-confirmation">{{ __('Confirmar contraseña nueva') }}</label>
                            <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirmar contraseña nueva') }}" value="" required />
                        </div>
                        </div>
                    </div>
                    <div class="card-footer ml-auto mr-auto">
                        <button type="submit" class="btn btn-info">{{ __('Cambiar Contraseña') }}</button>
                    </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
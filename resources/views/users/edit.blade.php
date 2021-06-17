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
                    <form method="POST" action="{{ route('user.update', $user->id) }}">
                        <div class="card-body ">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
                                <div class="col-sm-7">
                                  <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Nombre') }}" value="{{$user->name}}" aria-required="true"/>
                                    @include('alerts.feedback', ['field' => 'name'])
                                  </div>
                                </div>
                            </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Correo') }}</label>
                            <div class="col-sm-7">
                              <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="text" placeholder="{{ __('Correo') }}" value="{{$user->email}}" aria-required="true"/>
                                @include('alerts.feedback', ['field' => 'email'])
                              </div>
                            </div>
                        </div>
                        </div>
                        <div class="card-footer ">
                            <a href="{{ route('user.index') }}"><button type="button" class="btn btn-fill btn-default">Cancelar</button></a>
                            <button type="submit" class="btn btn-fill btn-info">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

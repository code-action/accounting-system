@extends('layouts.app', ['activePage' => 'producto', 'titlePage' => __('Crear Producto')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card ">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">control_point_duplicate</i>
                        </div>
                        <h4 class="card-title">Agregar Usuario</h4>
                    </div>
                    <form method="POST" action="{{ route('user.update', $user->id) }}">
                        <div class="card-body ">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="form-group bmd-form-group col-md-12">
                                    <label for="name" class="bmd-label-floating">Nombre</label>
                                    <input value="{{ $user->name }}" type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="form-group bmd-form-group col-md-6">
                                    <label for="email" class="bmd-label-floating">Correo</label>
                                    <input value="{{ $user->email }}" type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="form-group bmd-form-group col-md-6">
                                    <label for="password" class="bmd-label-floating">Contraseña</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <a href="{{ route('user.index') }}"><button type="button" class="btn btn-fill btn-default">Cancelar</button></a>
                            <button type="submit" class="btn btn-fill btn-rose">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

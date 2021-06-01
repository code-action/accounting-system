@extends('layouts.app', ['activePage' => 'producto', 'titlePage' => __('Crear Producto')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card ">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">inventory_2</i>
                        </div>
                        <h4 class="card-title">Editar Producto</h4>
                    </div>
                    <form method="POST" action="{{ route('producto.store') }}">
                        <div class="card-body ">
                            @csrf
                            <div class="row">
                                <div class="form-group bmd-form-group col-md-12">
                                    <label for="mat_nombre" class="bmd-label-floating">Nombre</label>
                                    <input value="{{ $productos->prod_nombre }}" type="text" class="form-control" id="mat_nombre" name="prod_nombre">
                                </div>
                                <div class="form-group bmd-form-group col-md-6">
                                    <label for="mat_cantidad" class="bmd-label-floating">Cantidad</label>
                                    <input value="{{ $productos->prod_cantidad }}" type="number" class="form-control" id="mat_cantidad" name="prod_cantidad">
                                </div>
                                <div class="form-group bmd-form-group col-md-6">
                                    {{-- <label for="exampleFormControlSelect1">Categoría</label> --}}
                                    <select class="form-control selectpicker" data-style="btn btn-link" id="" name="categoria_id">
                                        <option value="" selected disabled><b>Categoría</b></option>
                                        @foreach($categorias as $c)
                                            <option @if($c->id == $productos->categoria_id) selected @endif value="{{ $c->id }}">{{ $c->cat_nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group bmd-form-group col-md-4">
                                    <label for="prod_precio" class="bmd-label-floating">Precio</label>
                                    <input value="{{ $productos->prod_precio }}" pattern="^\d*(\.\d{0,2})?$" class="form-control" id="prod_precio" name="prod_precio">
                                </div>
                                <div class="form-group bmd-form-group col-md-8">
                                    <label for="prod_desc" class="bmd-label-floating">Descripción</label>
                                    <input value="{{ $productos->prod_desc }}" type="text" class="form-control" id="prod_desc" name="prod_desc">
                                </div>
                                <div class="row px-4 mt-4" style="overflow-y:scroll;max-height:190px;width: 100%;">
                                    {{-- @if(!isset($materiales))
                                        <div>No hay materiales</div>
                                    @endif --}}
                                    @foreach($materiales as $m)
                                        <div class="form-group bmd-form-group col-md-8">
                                            <input readonly value="{{ $m->mat_nombre }} (max: {{ $m->mat_cantidad }})" type="text" class="form-control" id="mat_nombre_{{ $m->id }}" name="mat_nombre[]">
                                            <input value="{{ $m->id }}" type="hidden" class="form-control" name="mat_id[]">
                                        </div>
                                        <div class="form-group bmd-form-group col-md-4">
                                            <label for="mat_cantidad_{{ $m->id }}" class="bmd-label-floating">Cantidad</label>
                                            <input value="{{ $productos->materiales[0]->mat_prod_cantidad }}" type="number" class="form-control" id="mat_cantidad_{{ $m->id }}" name="mat_cantidad[]" max="{{ $m->mat_cantidad }}">
                                        </div>
                                    @endforeach
                                </div>
                                {{-- <button class="btn btn-flat btn-secondary col-12">Agregar material</button> --}}
                            </div>
                        </div>
                        <div class="card-footer ">
                            <a href="{{ route('raw.index') }}"><button type="button" class="btn btn-fill btn-default">Cancelar</button></a>
                            <button type="submit" class="btn btn-fill btn-info">Modificar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

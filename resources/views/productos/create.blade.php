@extends('layouts.app', ['activePage' => 'producto', 'titlePage' => __('Crear Producto')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('producto.store') }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('post')

                        <div class="card ">
                            <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">inventory_2</i>
                                </div>
                                <h4 class="card-title">{{ __('Agregar Producto') }}</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row ">
                                    <div class="col-md-5">
                                        <div class="row ">
                                            <label class="col-sm-3 col-md-3 col-lg-2 col-form-label">{{ __('Código') }}</label>
                                            <div class="col-sm-10">
                                                <div class="form-group{{ $errors->has('prod_codigo') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('prod_codigo') ? ' is-invalid' : '' }}"
                                                           name="prod_codigo" id="input-prod_codigo" type="text"
                                                           placeholder="{{ __('Código del producto') }}" value="{{ old('prod_codigo') }}"
                                                           aria-required="true"/>
                                                    @include('alerts.feedback', ['field' => 'prod_codigo'])
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <label class="col-sm-3 col-md-3 col-lg-2 col-form-label">{{ __('Nombre') }}</label>
                                            <div class="col-sm-10">
                                                <div class="form-group{{ $errors->has('prod_nombre') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('prod_nombre') ? ' is-invalid' : '' }}"
                                                           name="prod_nombre" id="input-mat_nombre" type="text"
                                                           placeholder="{{ __('Nombre del producto') }}" value="{{ old('prod_nombre') }}"
                                                           aria-required="true"/>
                                                    @include('alerts.feedback', ['field' => 'prod_nombre'])
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-md-3 col-lg-2 col-form-label">{{ __('Cantidad') }}</label>
                                            <div class="col-sm-10">
                                                <div class="form-group{{ $errors->has('prod_cantidad') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('prod_cantidad') ? ' is-invalid' : '' }}"
                                                           name="prod_cantidad" id="input-mat_cantidad" type="text"
                                                           placeholder="{{ __('Cantidad') }}" value="{{ old('prod_cantidad') }}"
                                                           aria-required="true"/>
                                                    @include('alerts.feedback', ['field' => 'prod_cantidad'])
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="col-sm-3 col-md-3 col-lg-2 col-form-label">{{ __('Precio') }}</label>
                                            <div class="col-sm-10">
                                                <div class="form-group {{ $errors->has('prod_precio') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('prod_precio') ? ' is-invalid' : '' }}"
                                                           name="prod_precio" id="input-prod_precio" type="text"
                                                           placeholder="{{ __('Precio') }}" value="{{ old('prod_precio') }}"
                                                           aria-required="true"/>
                                                    @include('alerts.feedback', ['field' => 'prod_precio'])
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <label class="col-sm-3 col-md-3 col-lg-2 col-form-label">{{ __('Categoría') }}</label>
                                            <div class="col-sm-10">
                                                <div class="form-group" style="margin-top: 16px;">
                                                    <select class="js-example-basic-single js-states form-control
                                                    {{ $errors->has('categoria_id') ? ' has-danger' : '' }}"
                                                            name="categoria_id" id="input-categoria_id"
                                                            data-style="select-with-transition" title=""
                                                            data-size="100" style="width: 100%">
                                                        <option value="" disabled selected></option>
                                                        @foreach($categorias as $c)
                                                            <option value="{{$c->id}}"
                                                                    @if(old('categoria_id') == $c->id) selected @endif>
                                                                {{$c->cat_nombre}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @include('alerts.feedback', ['field' => 'categoria_id'])
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <label class="col-sm-4 col-md-4 col-lg-4 col-form-label">{{ __('Presentación') }}</label>
                                                    <div class="col-sm-8">
                                                        <div class="form-group" style="margin-top: 16px;">
                                                            <select class="js-example-basic-single js-states form-control
                                                        {{ $errors->has('prod_empaque') ? ' has-danger' : '' }}"
                                                                    name="prod_empaque" id="input-prod_empaque"
                                                                    data-style="select-with-transition" title=""
                                                                    data-size="100" style="width: 100%">
                                                                <option value="" disabled selected></option>
                                                                @foreach($empaques as $e)
                                                                    <option value="{{$e->id}}"
                                                                            @if(old('prod_empaque') == $e->id) selected @endif>
                                                                        {{$e->emp_nombre}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @include('alerts.feedback', ['field' => 'prod_empaque'])
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="row">
                                                    {{--<label class="col-sm-3 col-md-3 col-lg-2 col-form-label">
                                                    {{ __('Contenido') }}</label>--}}
                                                    <div class="col-sm-12" >
                                                        <div class="form-group {{ $errors->has('prod_contenido') ? ' has-danger' : '' }}">
                                                            <input class="form-control{{ $errors->has('prod_contenido') ? ' is-invalid' : '' }}"
                                                                   name="prod_contenido" id="input-prod_contenido" type="text"
                                                                   placeholder="{{ __('Contenido') }}" value="{{ old('prod_contenido') }}"
                                                                   aria-required="true"/>
                                                            @include('alerts.feedback', ['field' => 'prod_contenido'])
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    {{--<label class="col-sm-3 col-md-3 col-lg-2 col-form-label">
                                                    {{ __('Medida') }}</label>--}}
                                                    <div class="col-sm-12">
                                                        <div class="form-group" style="margin-top: 16px;">
                                                            <select class="js-example-basic-single js-states has-error select2
                                                                form-control" name="prod_medida" id="input-prod_medida"
                                                                    data-style="select-with-transition" title=""
                                                                    data-size="100" style="width: 100%">
                                                                <option value="" disabled selected></option>
                                                                @foreach($medidas as $m)
                                                                    <option value="{{$m->id}}"
                                                                            @if(old('prod_medida') == $m->id) selected @endif>
                                                                        {{$m->med_nombre}} ({{$m->med_abreviatura}})
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @include('alerts.feedback', ['field' => 'prod_medida'])
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <label class="col-sm-3 col-md-3 col-lg-2 col-form-label">{{ __('Descripción') }}</label>
                                            <div class="col-sm-10">
                                                <div class="form-group{{ $errors->has('prod_descripcion') ? ' has-danger' : '' }}">
                                                    <textarea class="form-control{{ $errors->has('prod_descripcion') ? ' is-invalid' : '' }}"
                                                              name="prod_descripcion" id="input-prod_descripcion" type="text"
                                                              placeholder="{{ __('Descripción del producto') }}"
                                                              aria-required="true">{{old('prod_descripcion') }}</textarea>
                                                    @include('alerts.feedback', ['field' => 'prod_descripcion'])
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <label class="col-sm-3 col-md-3 col-lg-2 col-form-label">{{ __('Procedimiento') }}</label>
                                            <div class="col-sm-10" >
                                                <div class="form-group{{ $errors->has('prod_proced') ? ' has-danger' : '' }}">
                                                    <textarea class="form-control{{ $errors->has('prod_proced') ? ' is-invalid' : '' }}"
                                                              name="prod_proced" id="input-prod_proced" type="text" rows="3"
                                                              placeholder="{{ __('Procedimiento de elaboración') }}"
                                                              aria-required="true">{{old('prod_proced') }}</textarea>
                                                    @include('alerts.feedback', ['field' => 'prod_proced'])
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <a href="{{ route('producto.index') }}"><button type="button" class="btn btn-fill btn-default">Cancelar</button></a>
                                <button type="submit" class="btn btn-fill btn-info">Agregar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{--<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card ">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">inventory_2</i>
                            </div>
                            <h4 class="card-title">{{ __('Agregar Producto') }}</h4>
                        </div>
                        <form method="POST" action="{{ route('producto.store') }}" autocomplete="off">
                            <div class="card-body ">
                                @csrf
                                <div class="row">
                                    <div class="form-group bmd-form-group col-md-12">
                                        <label for="mat_nombre" class="bmd-label-floating">Nombre</label>
                                        <input type="text" class="form-control" id="mat_nombre" name="prod_nombre">
                                    </div>
                                    <div class="form-group bmd-form-group col-md-6">
                                        <label for="mat_cantidad" class="bmd-label-floating">Cantidad</label>
                                        <input type="number" class="form-control" id="mat_cantidad" name="prod_cantidad">
                                    </div>
                                    <div class="form-group bmd-form-group col-md-6">
                                        {{-- <label for="exampleFormControlSelect1">Categoría</label> }}
    <select class="form-control selectpicker" data-style="btn btn-link" id="" name="categoria_id">
        <option value="" selected disabled><b>Categoría</b></option>
        @foreach($categorias as $c)
            <option value="{{ $c->id }}">{{ $c->cat_nombre }}</option>
        @endforeach
    </select>
    @include('alerts.feedback', ['field' => 'categoria_id'])
    </div>
    <div class="form-group bmd-form-group col-md-4">
        <label for="prod_precio" class="bmd-label-floating">Precio</label>
        <input pattern="^\d*(\.\d{0,2})?$" class="form-control" id="prod_precio" name="prod_precio">
    </div>
    <div class="form-group bmd-form-group col-md-8">
        <label for="prod_desc" class="bmd-label-floating">Descripción</label>
        <input type="text" class="form-control" id="prod_desc" name="prod_desc">
    </div>
    <div class="row px-4 mt-4" style="overflow-y:scroll;max-height:190px;width: 100%;">
        {{-- @if(!isset($materiales))
            <div>No hay materiales</div>
        @endif }}
        @foreach($materiales as $m)
            <div class="form-group bmd-form-group col-md-8">
                <input readonly value="{{ $m->mat_nombre }} (max: {{ $m->mat_cantidad }})" type="text" class="form-control" id="mat_nombre_{{ $m->id }}" name="mat_nombre[]">
                <input value="{{ $m->id }}" type="hidden" class="form-control" name="mat_id[]">
            </div>
            <div class="form-group bmd-form-group col-md-4">
                <label for="mat_cantidad_{{ $m->id }}" class="bmd-label-floating">Cantidad</label>
                <input type="number" class="form-control" id="mat_cantidad_{{ $m->id }}" name="mat_cantidad[]" max="{{ $m->mat_cantidad }}">
            </div>
        @endforeach
    </div>
    {{-- <button class="btn btn-flat btn-secondary col-12">Agregar material</button> }}
    </div>
    </div>
    <div class="card-footer ">
        <a href="{{ route('producto.index') }}"><button type="button" class="btn btn-fill btn-default">Cancelar</button></a>
        <button type="submit" class="btn btn-fill btn-info">Agregar</button>
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>--}}

@endsection
@push('js')
    <script>
        $("#input-categoria_id").select2({
            language: {
                noResults: function() {
                    return "{{__('Resultado no encontrado')}}";
                },
                searching: function() {
                    return "{{__('Buscando')}}...";
                }
            },
            placeholder: 'Seleccione una categoría',
        })

        $("#input-prod_medida").select2({
            language: {
                noResults: function() {
                    return "{{__('Resultado no encontrado')}}";
                },
                searching: function() {
                    return "{{__('Buscando')}}...";
                }
            },
            placeholder: 'Selec. unidad de medida',
        })
        $("#input-prod_empaque").select2({
            language: {
                noResults: function() {
                    return "{{__('Resultado no encontrado')}}";
                },
                searching: function() {
                    return "{{__('Buscando')}}...";
                }
            },
            placeholder: 'Selec. presentación',
        })
    </script>
@endpush

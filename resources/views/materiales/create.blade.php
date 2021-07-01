@extends('layouts.app', ['activePage' => 'materiales', 'titlePage' => __('Materia Prima')])

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <form method="post" action="{{ route('raw.store') }}" autocomplete="off" class="form-horizontal"
                    id="form_material">
                        @csrf
                        @method('post')

                        <div class="card">
                            <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">storefront</i>
                                </div>
                                <h4 class="card-title">{{ __('Agregar Materia Prima') }}</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row ">
                                    <div class="col-md-11">

                                        <div class="row" id="nombreMateria">
                                            <label class="col-sm-3 col-md-3 col-lg-2 col-form-label">{{ __('Nombre') }}</label>
                                            <div class="col-sm-12 col-lg-10 ">
                                                <div class="form-group" id="form-group-mat_nombre">
                                                    <input class="form-control{{ $errors->has('mat_nombre') ? ' is-invalid' : '' }}"
                                                           name="mat_nombre" id="i-mat_nombre" type="text"
                                                           placeholder="{{ __('Nombre Materia Prima') }}" value="{{ old('mat_nombre') }}"
                                                           aria-required="true"/>

                                                    <span id="i-mat_nombre-error" class="error text-danger"
                                                          for="input-i-mat_nombre" style="display: none;">
                                                                {{ __('El campo nombre de materia prima es requerido y tener al menos 3 caracteres')}}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="datosPresentacion">
                                            <label class="col-sm-3 col-md-3 col-lg-2 col-form-label">{{ __('Presentación') }}</label>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <select class="js-example-basic-single js-states form-control" name="empaque_id" id="empaque_id" data-style="select-with-transition" title="" data-size="100" style="width: 100%">
                                                        <option value="" selected disabled style="background-color:lightgray">{{__('Seleccione la presentaciòn')}}</option>
                                                        @foreach ($empaques as $empaque)
                                                            <option value="{{$empaque->id}}">{{ $empaque->emp_nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group {{ $errors->has('mat_contenido') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('mat_contenido') ? ' is-invalid' : '' }}"
                                                        name="mat_contenido" id="mat_contenido" type="number"
                                                        placeholder="{{ __('Contenido') }}" value=""
                                                        aria-required="true" min="0.01" step="0.01" onKeyPress= 'return positiveNumberH( this, event,this.value);'/>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <select class="js-example-basic-single js-states form-control" name="medida_id" id="medida_id" data-style="select-with-transition" title="" data-size="100" style="width: 100%">
                                                        <option value="" selected disabled style="background-color:lightgray">{{__('Seleccione una unidad de medida')}}</option>
                                                        @foreach ($medidas as $medida)
                                                            <option value="{{$medida->id}}">{{ $medida->med_nombre }} ({{$medida->med_abreviatura}})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <label class="col-sm-3 col-md-3 col-lg-2 col-form-label"></label>
                                            <div class="col-sm-9">
                                                <span id="i-mat_contenido-error" class="error text-danger" style="display: none;">
                                                    {{ __('Los campos de la presentación son requeridos')}}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br><br>
                                    <div id="contenedor" class="col-md-9 col-sm-12 offset-md-1 offset-lg-2">
                                        {{--Para agregar nuevos proveedores --}}
                                        <div id="add_mat_prov1" class="row breadcrumb">
                                            <div class="col-md-3 col-sm-2">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group" id="form-group-mat_cantidad1">
                                                            <input class="form-control{{ $errors->has('mat_cantidad') ? ' is-invalid' : '' }}"
                                                                   name="" id="mat_cantidad1" type="number"
                                                                   placeholder="{{ __('Cantidad') }}" value=""
                                                                   aria-required="true"/>
                                                            <span id="mat_cantidad1-error" class="error text-danger"
                                                                  for="input-mat_cantidad1" style="display: none;">
                                                                {{ __('El campo cantidad es requerido y debe ser un número entero')}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group" id="form-group-mat_precio_u1">
                                                            <input class="form-control{{ $errors->has('mat_precio_u') ? ' is-invalid' : '' }}"
                                                                   name="" id="mat_precio_u1" type="number" step="0.01"
                                                                   placeholder="{{ __('Precio Unitario') }}" value=""
                                                                   aria-required="true" min="0.01" max="999999" maxlength="6"/>
                                                            <span id="mat_precio_u1-error" class="error text-danger"
                                                                  for="input-mat_precio_u1" style="display: none;">
                                                                {{ __('El campo precio unitario es requerido y debe tener 8 dígitos como máximo')}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-5 col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div style="margin-top: 16px;" class="form-group" id="form-group-select_prov_nombre1">
                                                            <select class="js-example-basic-single js-states has-error select
                                                            form-control" name="" id="select_prov_nombre1"
                                                                    data-style="select-with-transition"
                                                                    data-size="100" style="width: 100%">
                                                                <option selected disabled value="0">
                                                                    {{__('Seleccione un proveedor')}}
                                                                </option>
                                                                @foreach ($proveedores as $proveedor)
                                                                    <option  value="{{$proveedor->id}}">
                                                                        {{ $proveedor->prov_nombre }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <span id="prov_nombre1-error" class="error text-danger"
                                                                  for="input-prov_nombre1" style="display: none;">
                                                                {{ __('El campo precio proveedor es requerido')}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 col-sm-1">
                                                <div class="row justify-content-center" style="margin-top: 9px;" >
                                                    <a rel="tooltip" class="btn td-actions btn-success btn-sm btn-round
                                                    btn-fab add" href="#" data-original-title=""
                                                       title="{{ __('Agregar') }}">
                                                        <i class="material-icons">add</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>

                                        {{--cantidad, preciou y proveedores que se envian--}}
                                        {{--Oculto--}}
                                        <div id="add_mat_prov0"  class="row" style="display: none">
                                            <div class="col-md-3 col-sm-2">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group {{ $errors->has('mat_cantidad') ? ' has-danger' : '' }}">
                                                            <input class="form-control{{ $errors->has('mat_cantidad') ? ' is-invalid' : '' }}"
                                                                   name="" id="i-mat_cantidad" type="number"
                                                                   placeholder="{{ __('Cantidad') }}" value=""
                                                                   aria-required="true" disabled/>
                                                            <input type="hidden" name="mat_cantidad[]"
                                                                   value="" id="i-mat_cantidad_o" disabled/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group{{ $errors->has('mat_precio_u') ? ' has-danger' : '' }}">
                                                            <input class="form-control{{ $errors->has('mat_precio_u') ? ' is-invalid' : '' }}"
                                                                   name="mat_precio_u[]" id="i-mat_precio_u" type="number" step="0.01"
                                                                   placeholder="{{ __('Precio Unitario') }}" value="{{-- old('mat_precio_u') --}}"
                                                                   aria-required="true" disabled/>
                                                            <input type="hidden" name="mat_precio_u[]"
                                                                   value="" id="i-mat_preciou_o" disabled/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-5 col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div style="margin-top: 16px;" id="cotenedor_select" class="form-group prov_nombre
                                                            {{ $errors->has('prov_nombre') ? ' has-danger' : '' }}">
                                                            <select class="js-example-basic-single js-states has-error
                                                                form-control select" name="prov_nombre[]" id="i-prov_nombre"
                                                                    data-style="select-with-transition" title=""
                                                                    data-size="100" style="width: 100%" disabled>
                                                                <option selected disabled>
                                                                    {{__('Seleccione un proveedora')}}
                                                                </option>
                                                                @foreach ($proveedores as $proveedor)
                                                                    <option id="proveedor_{{$proveedor->id}}" value="{{$proveedor->id}}">
                                                                        {{ $proveedor->prov_nombre }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <input type="hidden" name="prov_nombre[]"
                                                                   value="" id="i-prov_nombre_o" disabled/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--Botón eliminar--}}
                                            <div class="col-md-1 col-sm-1">
                                                <div class="row justify-content-center" style="margin-top: 9px;">
                                                    <a href="#" data-original-title="" class="btn btn-danger
                                                        btn-sm btn-round btn-fab delete" title="{{ __('Eliminar') }}">
                                                        <i class="material-icons">close</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer" id="footer">
                                <a href="{{ route('raw.index') }}"><button type="button" class="btn btn-fill btn-default">Cancelar</button></a>
                                <a href="#"><button type="button" class="btn btn-fill btn-info submit">Agregar</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modals')
    <div class="modal fade" id="mensaje_error" role="dialog">
        <div class="modal-dialog" role="document" id="">
            <div class="modal-content">
                <div class="modal-header">
                    {{--<h3 class="modal-title">{{ __('No se ha agregado ningún producto a la cotización')}}</h3>--}}
                    <button class="close cerrarModal" type="button" aria-label="Close" data-dismiss="modal"
                            style="position: absolute; z-index: 5;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center" >
                    <h3 class="modal-title" id="titulo_mensaje_error"></h3>
                </div>
                <div class="modal-footer">
                    <div class="d-grid gap-2 d-md-block">
                        <button class="btn btn-default" type="button" data-dismiss="modal">{{ __('Cerrar') }}</button>
                    </div>
                </div>
                <?php
                count($errors->get('prov_nombre.*'))
                ?>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        {{$error}} <br>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <text id="mensaje_sin_proveedores" class="d-none">{{ __('No se ha agregado ningún proveedor')}}</text>
@endsection

@push('js')

    <script src="{{asset('js/materiales/create.js')}}"></script>
    <script>
        $("#select_prov_nombre1").select2({
            language: {
                noResults: function() {
                    return "{{__('Resultado no encontrado')}}";
                },
                searching: function() {
                    return "{{__('Buscando')}}...";
                }
            },
            placeholder: '{{__('Seleccione un proveedor')}}',
        })
    </script>
    <script>
        $("#empaque_id").select2({
            language: {
                noResults: function() {
                    return "{{__('Resultado no encontrado')}}";
                },
                searching: function() {
                    return "{{__('Buscando')}}...";
                }
            },
            placeholder: '{{__('Seleccione la presentación')}}',
        })
    </script>
    <script>
        $("#medida_id").select2({
            language: {
                noResults: function() {
                    return "{{__('Resultado no encontrado')}}";
                },
                searching: function() {
                    return "{{__('Buscando')}}...";
                }
            },
            placeholder: '{{__('Seleccione una unidad de medida')}}',
        })
    </script>
@endpush

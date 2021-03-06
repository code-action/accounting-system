@extends('layouts.app', ['activePage' => 'cotizacion', 'titlePage' => __('Cotizaciones')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">assignment</i>
                            </div>
                            <h4 class="card-title">{{ __('Editar Cotización') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('cotizacion.index') }}" class="btn btn-sm btn-info">{{ __('Regresar') }}</a>
                                </div>
                            </div>
                            {{--<div class="row">
                                <div class="col-md-12 text-right">
                                    <a href="#" class="btn btn-info">{{ __('Agregar producto') }}</a>
                                </div>
                            </div>--}}

                            <div class="row">
                                {{-- Inicio de  Agregar Productos --}}
                                <div class="col-md-10 col-lg-5">
                                    <div class="card border mb-3" style="max-width: 100rem; border: dimgray 1px solid">
                                        <div class="card-header bg-light" {{--style="border: dimgray 1px solid"--}}>
                                            <h4><b>Agregar productos</b></h4>
                                        </div>
                                        <div class="card-body text-dark border">
                                            {{--<h5 class="card-title"><h4><b>Agregar Productos</b></h4></h5>--}}
                                            <div class="table-responsive">
                                                <table id="datatables" class="table table-striped table-no-bordered
                                                table-hover datatable-rose" style="width: 100%">
                                                    <thead class="text-primary">

                                                    <th>
                                                        {{ __('Producto') }}
                                                    </th>
                                                    <th style="width: 70px;">
                                                        {{ __('Cant.') }}
                                                    </th>

                                                    <th style="width: 90px;">
                                                        {{ __('Precio U.') }}
                                                    </th>
                                                    <th  style="width: 105px;">
                                                        {{ __('Exist.') }}
                                                    </th>
                                                    <th class="text-right" style="width: 50px;">
                                                        {{ __('Acción') }}
                                                    </th>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($productos as $producto)
                                                        <tr>
                                                            <td>
                                                                {{$producto->prod_nombre}}
                                                                <input type="hidden" name="prod_id" id="prod_id"
                                                                       value="{{$producto->id}}">
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control input-cantidad" id="prod_cantidad"
                                                                       name="prod_cantidad" min="1" value="1"
                                                                       max="{{$producto->prod_cantidad}}">
                                                            </td>
                                                            <td>{{ number_format($producto->prod_precio, 2, '.', ',')}}</td>
                                                            <td>{{$producto->prod_cantidad}}</td>


                                                            <td class="td-actions text-right">


                                                                <a rel="tooltip" class="btn btn-success btn-link add_product"
                                                                   data-original-title="" title="{{ __('Agregar')}}">
                                                                    <i class="material-icons">add</i>
                                                                    <div class="ripple-container"></div>
                                                                </a>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Fin de Agregar Productos --}}
                                {{-- Inicio de Cotización --}}
                                <div class="col-md-10 col-lg-7">
                                    <div class="card border mb-3" style="max-width: 100rem;">
                                        <div class="card-header border bg-light" {{--style="border: dimgray 1px solid"--}}>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4><b>Cotización</b> No. 00125</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <h4 class="text-right">{{date("d-m-Y", strtotime($cotizacion->cot_fecha))}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body text-dark">
                                            {{--<h5 class="card-title" ><h4><b>Detalles de Cotización</b></h4></h5>--}}
                                            <div class="row justify-content-end cliente-datos">
                                                <div class="col-md-7">


                                                    <div class="row">
                                                        {{--<label class="col-sm-2 col-form-label">{{ __('Cliente') }}</label>--}}
                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <select class="js-example-basic-single js-states has-error
                                                                form-control" name="cli_nombre" id="input-cli_nombre"
                                                                        data-style="select-with-transition" title=""
                                                                        data-size="100" style="width: 100%">
                                                                    <option value="" disabled selected
                                                                            style="background-color:lightgray">
                                                                        {{__('Seleccione un cliente')}}
                                                                    </option>
                                                                    @foreach ($clientes as $cliente)
                                                                        <option id="cliente_{{$cliente->id}}" value="{{$cliente->id}}"
                                                                                categoria="{{$cliente->cli_categoria}}"
                                                                                @if ($cotizacion->cliente->id == $cliente->id)
                                                                                selected="selected" @endif">
                                                                            {{ $cliente->cli_nombre }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                <span id="input-cli_nombre-error" class="error text-danger"
                                                                      for="input-cli_nombre" style="display: none
                                                                {{--block--}};{{--This fixes a bootstrap known-issue--}}">
                                                                    {{ __('Seleccione un cliente') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        {{--<label class="col-sm-2 col-form-label">{{ __('Estado') }}</label>--}}
                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <select class="js-example-basic-single js-states has-error
                                                                form-control" name="cli_estado" id="input-cli_estado"
                                                                        data-style="select-with-transition" title=""
                                                                        data-size="100" style="width: 100%">
                                                                    <option value="" disabled selected
                                                                            style="background-color:lightgray">
                                                                        {{__('Seleccione un estado')}}
                                                                    </option>
                                                                    {{--<option value="Aceptada" {{ $cotizacion->cot_estado == 'Aceptada' ? 'selected':''}}>{{ __('Aceptada') }}</option>--}}
                                                                    <option value="Revision" {{ $cotizacion->cot_estado == 'Revision' ? 'selected':''}}>{{ __('Revisión') }}</option>
                                                                    <option value="Rechazada" {{ $cotizacion->cot_estado == 'Rechazada' ? 'selected':''}}>{{ __('Rechazada') }}</option>

                                                                </select>
                                                                <span id="input-cli_estado-error" class="error text-danger"
                                                                      for="input-cli_estado" style="display: none
                                                                {{--block--}};{{--This fixes a bootstrap known-issue--}}">
                                                                    {{ __('Seleccione un estado') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        {{--<label class="col-sm-2 col-form-label">{{ __('Descripción') }}</label>--}}
                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <textarea  class="form-control"
                                                                           name="cot_descripcion" id="cot_descripcion" type="text"
                                                                           placeholder="{{ __('Descripción (Opcional)') }}" value=""
                                                                           aria-required="true">{{$cotizacion->cot_descripcion}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    {{--<label class="col-sm-2 col-form-label">{{ __('Vendedor') }}</label>
                                                    <div class="col-sm-9">
                                                        <div class="form-group">
                                                            <select class="js-example-basic-single js-states
                                                            form-control" name="vend_nombre" id="input-vend_nombre"
                                                                    data-style="select-with-transition" title=""
                                                                    data-size="100" style="width: 100%">
                                                                <option value="" disabled selected
                                                                        style="background-color:lightgray">
                                                                    {{__('Seleccione un vendedor')}}
                                                                </option>
                                                                @foreach ($clientes as $cliente)
                                                                    <option value="{{$cliente->id}}">
                                                                        {{ $cliente->cli_nombre }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>--}}


                                                </div>
                                                <div class="col-md-5">
                                                    <div class="text-right">
                                                        <h4 class="text-right">{{ $empresa->info_nombre }}</h4>
                                                        <h6 class="text-right">{{ __('Dirección') }} {{ $empresa->info_direccion }}</h6>
                                                        <h6>{{ __('Fax:') }}
                                                            {{ $empresa->info_fax }}
                                                            {{ __('Tel.:') }}
                                                            {{ $empresa->info_telefono }}
                                                        </h6>
                                                        <h6>{{ __('Email:') }}
                                                            {{ $empresa->info_correo }}
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 text-right">
                                                    <a href="#" class="btn btn-primary btn-sm"
                                                       onclick="guardar_datos_prod('{{ route('cotizacion.update', $cotizacion)}}')"
                                                    >Guardar</a>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="table-responsive">
                                                <table id="datatables2" class="table table-striped table-no-bordered
                                                table-hover datatable-rose" style="width: 100%">
                                                    <thead class="text-primary">
                                                    <th>
                                                        {{ __('Producto') }}
                                                    </th>
                                                    <th style="width: 70px;">
                                                        {{ __('Cant.') }}
                                                    </th>
                                                    {{--<th>
                                                        {{ __('Descripción') }}
                                                    </th>--}}
                                                    <th style="width: 90px;">
                                                        {{ __('Precio U.') }}
                                                    </th>
                                                    <th style="width: 110px;">
                                                        {{ __('Precio Total') }}
                                                    </th>
                                                    <th class="text-right"  style="width:80px;">
                                                        {{ __('Acciones') }}
                                                    </th>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($cotizacion->productos as $producto)
                                                            <tr>
                                                                <td>
                                                                    {{$producto->prod_nombre}}
                                                                    <input type="hidden" value="{{$producto->id}}" id="prod_{{$producto->id}}">
                                                                </td>
                                                                <td>
                                                                    {{$producto->pivot->cot_prod_cantidad}}
                                                                    <input type="hidden" value="{{$producto->pivot->cot_prod_cantidad}}"
                                                                           id="cant_{{$producto->id}}">
                                                                </td>
                                                                <td>
                                                                    {{number_format($producto->prod_precio, 2, '.', ',')}}
                                                                    <input type="hidden"
                                                                           value="{{number_format($producto->prod_precio, 2, '.', ',')}}"
                                                                           id="prec_{{$producto->id}}">
                                                                </td>
                                                                <td>
                                                                    {{number_format($producto->prod_precio *
                                                                    $producto->pivot->cot_prod_cantidad, 2, '.', ',')}}

                                                                    <input type="hidden" id="prect_{{$producto->id}}" value="" >
                                                                    <input type="hidden" value="" id="precio_total">
                                                                </td>
                                                                <td class=" text-right">
                                                                    <button type="button" class="btn btn-danger btn-link del_product"
                                                                            style="margin-top: 0px; margin-left: 0px; margin-right: 0px; margin-bottom: 0px;
                                                                            padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px;"
                                                                            data-original-title="" title="">
                                                                        <i class="material-icons">close</i>
                                                                        <div class="ripple-container"></div></button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-md-7 col-lg-7 col-sm-7">
                                                    <div class="card border mb-3">
                                                        {{--<div class="card-header">Header</div>--}}
                                                        <div class="card-body text-dark">
                                                            <div class="table-responsive">
                                                                <table id="tabla_totales" class="table table-striped
                                                                table-no-bordered
                                                                    table-hover datatable-rose" style="width: 100%">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td><b>{{ __('Sumas') }}</b></td>
                                                                        <td id="cot_sumas">
                                                                            {{number_format($cotizacion->cot_sumas, 2, '.', ',')}}
                                                                        </td>
                                                                        <input type="hidden" id="input_cot_sumas"
                                                                               value="{{$cotizacion->cot_sumas}}">
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>{{ __('IVA 13%') }}</b></td>
                                                                        <td id="cot_iva">
                                                                            {{number_format($cotizacion->cot_iva, 2, '.', ',')}}
                                                                        </td>
                                                                        <input type="hidden" id="input_cot_iva"
                                                                               value="{{$cotizacion->cot_iva}}">
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>{{ __('Subtotal') }}</b></td>
                                                                        <td id="cot_subtotal">
                                                                            {{number_format($cotizacion->cot_subtotal, 2, '.', ',')}}
                                                                        </td>
                                                                        <input type="hidden" id="input_cot_subtotal"
                                                                               value="{{$cotizacion->cot_subtotal}}">
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>{{ __('Retención 1%') }}</b></td>
                                                                        <td id="cot_retencion">
                                                                            {{number_format($cotizacion->cot_retencion, 2, '.', ',')}}
                                                                        </td>
                                                                        <input type="hidden" id="input_cot_retencion"
                                                                               value="{{$cotizacion->cot_retencion}}">
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>{{ __('TOTAL') }}</b></td>
                                                                        <td id="cot_total">
                                                                            {{number_format($cotizacion->cot_total, 2, '.', ',')}}
                                                                        </td>
                                                                        <input type="hidden" id="input_cot_total"
                                                                               value="{{$cotizacion->cot_total}}">
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                {{-- Fin de Cotización --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cot_incompleta" role="dialog">
        <div class="modal-dialog" role="document" id="">
            <div class="modal-content">
                <div class="modal-header">
                    {{--<h3 class="modal-title">{{ __('No se ha agregado ningún producto a la cotización')}}</h3>--}}
                    <button class="close cerrarModal" type="button" aria-label="Close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center" id="modal_body_cot_incompleta">
                    <h3 class="modal-title">{{ __('No se ha agregado ningún producto a la cotización')}}</h3>
                </div>
                <div class="modal-footer">
                    <div class="d-grid gap-2 d-md-block">
                        <button class="btn btn-primary" type="button" data-dismiss="modal">{{ __('Cerrar') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cot_guardar" role="dialog">
        <div class="modal-dialog" role="document" id="">
            <div class="modal-content">
                <form id="form_guardar_cotizacion" action="" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-header">
                        <h3 class="modal-title">{{ __('¿Desea guardar la cotización?') }} {{--<b id="cli_nombre"></b>--}}</h3>
                        <button class="close cerrarModal" type="button" aria-label="Close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modal_body_cot_guardar">
                    </div>
                    <div class="modal-footer">
                        <div class="d-grid gap-2 d-md-block">
                            <button class="btn btn-light" type="button" data-dismiss="modal">{{ __('Cancelar') }}</button>
                            <button class="btn btn-success" type="submit">{{ __('Guardar') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@push('js')
    <script src="{{asset('js/cotizaciones/create.js')}}"></script>

    <script>
        $("#input-cli_nombre, #input-vend_nombre").select2({
            language: {
                noResults: function() {
                    return "{{__('Resultado no encontrado')}}";
                },
                searching: function() {
                    return "{{__('Buscando')}}...";
                }
            },
            placeholder: 'Seleccione un cliente',
        })

        $("#input-cli_estado").select2({
            language: {
                noResults: function() {
                    return "{{__('Resultado no encontrado')}}";
                },
                searching: function() {
                    return "{{__('Buscando')}}...";
                }
            },
            placeholder: 'Seleccione un estado',
            minimumResultsForSearch: Infinity
        })
    </script>


    <script type="text/javascript">

    </script>
    <script>
        $(document).ready(function() {
            var tablaAgregar = $('#datatables').fadeIn(1100);
            tablaAgregar.DataTable({
                scrollY: "30rem",
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                info: false,
                "paging": false,
                responsive: false,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Buscar productos",
                    "lengthMenu": 'Mostrar _MENU_ registros',
                    "info": 'Mostrando página _PAGE_ de _PAGES_',
                    "infoEmpty": 'No hay registros disponibles',
                    "zeroRecords": 'Registro no encontrado',
                    "infoFiltered": '(Total de registros filtrados _MAX_)',
                    "paginate": {
                        "next":     'siguiente',
                        "previous": 'anterior',
                        "first":    'primero',
                        "last":     'último'
                    },
                },
                "columnDefs": [
                    { "orderable": false, "targets": [1, 4] },
                    {"visible": true},
                ],
            });
        });
        $(document).ready(function() {
            $('#datatables2').fadeIn(1100);
            $('#datatables2').DataTable({
                scrollY: "18rem",
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                info: false,
                "paging": false,
                responsive: false,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Buscar productos",
                    "lengthMenu": 'Mostrar _MENU_ registros',
                    "info": 'Mostrando página _PAGE_ de _PAGES_',
                    "infoEmpty": 'No hay registros disponibles',
                    "zeroRecords": 'Registro no encontrado',
                    "infoFiltered": '(Total de registros filtrados _MAX_)',
                    "paginate": {
                        "next":     'siguiente',
                        "previous": 'anterior',
                        "first":    'primero',
                        "last":     'último'
                    },
                },
                "columnDefs": [
                    { "orderable": false, "targets": 4 },
                    { "targets": [4], className: "text-right", }
                ],
            });
        });
    </script>
@endpush

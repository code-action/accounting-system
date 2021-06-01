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
                            <h4 class="card-title">{{ __('Ver Cotización') }}</h4>
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

                            <div class="row {{--justify-content-start--}}">
                                {{-- Inicio de  Agregar Productos --}}

                                {{-- Fin de Agregar Productos --}}
                                {{-- Inicio de Cotización --}}
                                <div class="col-md-12 col-sm-12 col-lg-8">
                                    <div class="card border mb-3" style="max-width: 100rem; {{--border-style:
                                    solid; border-width: 1px;--}}">
                                        <div class="card-header border bg-light" {{--style="border-bottom-style: solid; border-width: 1px;"--}}>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4><b>Cotización</b> No. 00125</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <h4 class="text-right">
                                                        {{date("d-m-Y", strtotime($cotizacion->cot_fecha))}}
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body text-dark">
                                            {{--<h5 class="card-title" ><h4><b>Detalles de Cotización</b></h4></h5>--}}
                                            <div class="row justify-content-end cliente-datos">
                                                <div class="col-md-7">
                                                    {{--<label class="col-sm-1 col-form-label">{{ __('Fecha') }}</label>
                                                    <div class="col-sm-3">
                                                        <div class="form-group{{ $errors->has('cli_nombre') ? ' has-danger' : '' }}">
                                                            <input class="form-control{{ $errors->has('cli_nombre') ? ' is-invalid' : '' }}"
                                                                   name="cli_nombre" id="input-cli_nombre" type="text"
                                                                   placeholder="{{ __('Fecha') }}" value="{{ $hoy }}"
                                                                   aria-required="true" disabled/>
                                                            @include('alerts.feedback', ['field' => 'cli_nombre'])
                                                        </div>
                                                    </div>--}}

                                                    {{--<div class="row">
                                                        <label class="col-sm-2 col-form-label">{{ __('Cliente') }}</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-group">
                                                                <input  class="form-control"
                                                                           name="cot_descripcion" id="cot_descripcion" type="text"
                                                                           placeholder="{{ __('Cliente') }}" value="{{$cotizacion->cliente->cli_nombre}}"
                                                                           aria-required="true" disabled/>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <label class="col-sm-2 col-form-label">{{ __('Descripción') }}</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-group">
                                                                <textarea  class="form-control"
                                                                           name="cot_descripcion" id="cot_descripcion" type="text"
                                                                           placeholder="{{ __('Descripción') }}" value=""
                                                                           aria-required="true" disabled>{{$cotizacion->cot_descripcion}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>--}}

                                                    <div class="text-left">
                                                        <h4><b>{{ __('Cliente') }}: </b>
                                                            {{ $cotizacion->cliente->cli_nombre}}
                                                        </h4>
                                                        <h6><b>{{ __('Descripción')}}: </b>{{$cotizacion->cot_descripcion}}</h6>
                                                        <h6><b>{{ __('Email') }}: </b>{{$cotizacion->cliente->cli_email}}</h6>
                                                        <h6><b>{{ __('Teléfono') }}: </b>{{$cotizacion->cliente->cli_telefono}}</h6>
                                                        <h6>email: empresara@gmail.com</h6>
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
                                                        <h4 class="text-right">Empresa R&A, S.A. de C.V.</h4>
                                                        <h6 class="text-right">Pasaje J No. 3T Colonia San Carlos, San Salvador</h6>
                                                        <h6>PBX: (503) 26548-8965 Fax: (503) 2789-8923</h6>
                                                        <h6>email: empresara@gmail.com</h6>
                                                    </div>
                                                </div>
                                            </div>

                                            {{--<div class="row">
                                                <div class="col-12 text-right">
                                                    <a href="#" class="btn btn-success"
                                                       onclick="guardar_datos_prod('cliente')">Guardar</a>
                                                </div>
                                            </div>--}}
                                            <br>
                                            <div class="table-responsive">
                                                <table id="cotizacion_show" class="table table-striped table-no-bordered
                                                table-hover datatable-rose" style="width: 100%">
                                                    <thead class="text-primary">
                                                    <th>
                                                        {{ __('Producto') }}
                                                    </th>
                                                    <th style="width: 90px;">
                                                        {{ __('Cant.') }}
                                                    </th>
                                                    {{--<th>
                                                        {{ __('Descripción') }}
                                                    </th>--}}
                                                    <th style="width: 110px;">
                                                        {{ __('Precio U.') }}
                                                    </th>
                                                    <th style="width: 130px;">
                                                        {{ __('Precio Total') }}
                                                    </th>
                                                    {{--<th class="text-right"  style="width:100px;">
                                                        {{ __('Acciones') }}
                                                    </th>--}}
                                                    </thead>
                                                    <tbody>
                                                        @foreach($cotizacion->productos as $producto)
                                                            <tr>
                                                                <td>
                                                                    {{$producto->prod_nombre}}
                                                                    <input type="hidden" name="prod_id" id="prod_id"
                                                                           value="{{$producto->id}}">
                                                                </td>
                                                                <td>{{$producto->pivot->cot_prod_cantidad}}
                                                                </td>
                                                                <td>
                                                                    {{ number_format($producto->prod_precio, 2, '.', ',')}}
                                                                </td>
                                                                <td>{{ number_format($producto->pivot->cot_prod_cantidad * $producto->prod_precio, 2, '.', ',')}}</td>

                                                                {{--<td class="td-actions text-right">
                                                                    <button type="button" class="btn btn-success btn-link add_product"
                                                                            onclick="enviar_datos_prod('/*datos del producto*/')"
                                                                            data-original-title="as" title="as">
                                                                        <i class="material-icons">add</i>
                                                                        <div class="ripple-container"></div>
                                                                    </button>
                                                                </td>--}}
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-md-4 col-lg-5 col-sm-7">
                                                    <div class="card border mb-3">
                                                        {{--<div class="card-header">Header</div>--}}
                                                        <div class="card-body text-dark">
                                                            <div class="table-responsive">
                                                                <table id="tabla_totales" class="table table-striped table-no-bordered
                                                                    table-hover datatable-rose" style="width: 100%">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td><b>{{ __('Sumas') }}</b></td>
                                                                        <td id="cot_sumas">
                                                                            {{ number_format($cotizacion->cot_sumas, 2, '.', ',')}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>{{ __('IVA 13%') }}</b></td>
                                                                        <td id="cot_iva">
                                                                            {{ number_format($cotizacion->cot_iva, 2, '.', ',')}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>{{ __('Subtotal') }}</b></td>
                                                                        <td id="cot_subtotal">
                                                                            {{ number_format($cotizacion->cot_subtotal, 2, '.', ',')}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>{{ __('Retención 1%') }}</b></td>
                                                                        <td id="cot_retencion">
                                                                            {{number_format($cotizacion->cot_retencion, 2, '.', ',')}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>{{ __('TOTAL') }}</b></td>
                                                                        <td id="cot_total">
                                                                            {{ number_format($cotizacion->cot_total, 2, '.', ',')}}
                                                                        </td>
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

@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('#cotizacion_show').fadeIn(1100);
            $('#cotizacion_show').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
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
            });
        });
    </script>

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
            }
        })
    </script>


@endpush

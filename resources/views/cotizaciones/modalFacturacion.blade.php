<div class="modal fade" id="facturar_cotizacion" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document" id="">
        <div class="modal-content">
            {{--@if(@count($cotizaciones) > 0) action="{{route('cotizacion.destroy', $cotizacion)}}"
                @else action="{{route('cotizacion.index')}}" @endif--}}
            <form id="form_facturar_cotizacion"  method="post">
                @csrf
                @method('post')
                <div class="modal-header">
                    {{-- <h3 class="modal-title">{{ __('¿Desea eliminar la cotización de') }} <b id="cot_fecha"></b>
                         {{ __('del cliente') }} <b id="cot_cli_nombre"></b>?</h3>--}}
                    <h3 class="modal-title text-center"><b>{{ __('¿Desea llevar a facturación esta cotización?')}}</b></h3>
                    <button class="close cerrarModal" type="button" aria-label="Close" data-dismiss="modal"
                            style="position: absolute; z-index: 5;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="row {{--justify-content-start--}}">
                        {{-- Inicio de  Agregar Productos --}}

                        {{-- Fin de Agregar Productos --}}
                        {{-- Inicio de Cotización --}}
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="card border mb-3" style="max-width: 100rem; {{--border-style:
                                    solid; border-width: 1px;--}}">
                                <div class="card-header border bg-light" {{--style="border-bottom-style: solid; border-width: 1px;"--}}>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4><b>Cotización</b> No. 00125</h4>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="text-right" id="fact_cot_fecha">
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body text-dark">
                                    {{--<h5 class="card-title" ><h4><b>Detalles de Cotización</b></h4></h5>--}}
                                    <div class="row justify-content-end cliente-datos">
                                        <div class="col-md-7">
                                            <div class="text-left">
                                                <h4>
                                                    <b>{{ __('Cliente') }}: </b>
                                                    <text id="fact_cli_nombre"></text>
                                                </h4>
                                                <h6>
                                                    <b>{{ __('Descripción')}}: </b>
                                                    <text id="fact_cot_descripcion"></text>
                                                </h6>
                                                <h6>
                                                    <b>{{ __('Email') }}: </b>
                                                    <text id="fact_cli_email"></text>
                                                </h6>
                                                <h6><b>{{ __('Teléfono') }}: </b>
                                                    <text id="fact_cli_telefono"></text>
                                                </h6>
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
                                                <h4 class="text-right"><text id="fact_cot_info_nombre">{{ $empresa->info_nombre }}</text></h4>
                                                <h6 class="text-right">{{ __('Dirección:') }}
                                                    <text id="fact_cot_info_direccion">{{ $empresa->info_direccion }}</text>
                                                </h6>
                                                <h6>{{ __('Teléfono:') }}
                                                    <text id="fact_cot_info_telefono">{{ $empresa->info_telefono }}</text>
                                                </h6>
                                                {{--<h6>email: empresara@gmail.com</h6>--}}
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
                                        <table id="cotizacion_facturar" class="table table-striped table-no-bordered
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

                                            <tr>
                                                <td>
                                                </td>
                                                <td>
                                                </td>
                                                <td>

                                                </td>
                                                <td></td>
                                            </tr>


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
                                                                <td id="fact_cot_sumas">

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>{{ __('IVA 13%') }}</b></td>
                                                                <td id="fact_cot_iva">

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>{{ __('Subtotal') }}</b></td>
                                                                <td id="fact_cot_subtotal">

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>{{ __('Retención 1%') }}</b></td>
                                                                <td id="fact_cot_retencion">

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>{{ __('TOTAL') }}</b></td>
                                                                <td id="fact_cot_total">

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
                <div class="modal-footer">
                    <div class="d-grid gap-2 d-md-block">
                        <button class="btn btn-light" type="button" data-dismiss="modal">{{ __('Cerrar') }}</button>
                        <button class="btn btn-success" type="submit">{{ __('Facturar') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



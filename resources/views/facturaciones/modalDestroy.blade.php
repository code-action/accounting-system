{{--<div class="modal fade" id="eliminar_facturacion" role="dialog">
    <div class="modal-dialog" role="document" id="">
        <div class="modal-content">

            <form id="form_eliminar_facturacion" method="post">
                @csrf
                @method('delete')
                <div class="modal-header">
                    <h3 class="modal-title">{{ __('¿Desea eliminar la facturación?') }}</h3>
                    <button class="close cerrarModal" type="button" aria-label="Close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <div class="d-grid gap-2 d-md-block">
                        <button class="btn btn-light" type="button" data-dismiss="modal">{{ __('Cancelar') }}</button>
                        <button class="btn btn-danger" type="submit">{{ __('Eiminar') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>--}}

<div class="modal fade" id="eliminar_facturacion" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document" id="">
        <div class="modal-content">
            {{--@if(@count($cotizaciones) > 0) action="{{route('cotizacion.destroy', $cotizacion)}}"
                @else action="{{route('cotizacion.index')}}" @endif--}}
            <form id="form_eliminar_facturacion"  method="post">
                @csrf
                @method('delete')
                <div class="modal-header">
                    {{-- <h3 class="modal-title">{{ __('¿Desea eliminar la cotización de') }} <b id="cot_fecha"></b>
                         {{ __('del cliente') }} <b id="cot_cli_nombre"></b>?</h3>--}}
                    <h3 class="modal-title text-center"><b>{{ __('¿Desea eliminar la facturación?') }}</b></h3>
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
                                            <h4><b>Facturación</b> No. 00125</h4>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="text-right" id="eliminar_fact_fecha">
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
                                                    <text id="eliminar_fact_cli_nombre"></text>
                                                </h4>
                                                {{--<h6>
                                                    <b>{{ __('Descripción')}}: </b>
                                                    <text id="eliminar_fact_descripcion"></text>
                                                </h6>--}}
                                                <h6>
                                                    <b>{{ __('Email') }}: </b>
                                                    <text id="eliminar_fact_cli_email"></text>
                                                </h6>
                                                <h6><b>{{ __('Teléfono') }}: </b>
                                                    <text id="eliminar_fact_cli_telefono"></text>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="text-right">
                                                <h4 class="text-right">
                                                    <text id="eliminar_fact_info_nombre">{{ $empresa->info_nombre }}</text>
                                                </h4>
                                                <h6 class="text-right">{{ __('Dirección:') }}
                                                    <text id="eliminar_fact_info_direccion">{{ $empresa->info_direccion }}</text>
                                                </h6>
                                                <h6>{{ __('Teléfono:') }}
                                                    <text id="eliminar_fact_info_telefono">{{ $empresa->info_telefono }}</text>
                                                </h6>
                                                {{--<h6>email: empresara@gmail.com</h6>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="table-responsive">
                                        <table id="facturacion_delete" class="table table-striped table-no-bordered
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
                                                                <td id="eliminar_fact_sumas">

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>{{ __('IVA 13%') }}</b></td>
                                                                <td id="eliminar_fact_iva">

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>{{ __('Subtotal') }}</b></td>
                                                                <td id="eliminar_fact_subtotal">

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>{{ __('Retención 1%') }}</b></td>
                                                                <td id="eliminar_fact_retencion">

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>{{ __('TOTAL') }}</b></td>
                                                                <td id="eliminar_fact_total">
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
                        <button class="btn btn-light" type="button" data-dismiss="modal">{{ __('Cancelar') }}</button>
                        <button class="btn btn-danger" type="submit">{{ __('Eliminar') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

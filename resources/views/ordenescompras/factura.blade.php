@extends('layouts.app', ['activePage' => 'ordenes', 'titlePage' => __('Órdenes de Compra')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">shopping_cart</i>
                            </div>
                            <h4 class="card-title">{{ __('Editar Orden de Compra') }}</h4>
                        </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('ordencompra.index') }}" class="btn btn-sm btn-info">{{ __('Regresar') }}</a>
                            </div>
                        </div>
                        <form method="post" action="{{ route('guardarmateriafactura') }}" autocomplete="off" class="form-horizontal" id="formfactura">
                            @csrf
                            @method('post')
                            <input type="hidden" name="id" value="{{$ordenCompra->id}}">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card border mb-3" style="max-width: 100rem;">

                                        <div class="card-header bg-light" {{--style="border: dimgray 1px solid"--}}>
                                            <h4><b>Información</b></h4>
                                        </div>
                                    <div class="card-body text-dark border">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-label label-top">{{ __('N° de Orden') }}</label>
                                            <input class="form-control" name="ord_numero" id="ord_numero" type="text" value="{{$ordenCompra->ord_numero}}" placeholder="{{ __('N° de Orden de Compra') }}"/>
                                            @include('alerts.feedback', ['field' => 'ord_fecha'])
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-label label-top">{{ __('Fecha') }}</label>
                                            <input class="form-control" name="ord_fecha" id="ord_fecha" type="date" value="{{$ordenCompra->ord_fecha}}"/>
                                            @include('alerts.feedback', ['field' => 'ord_fecha'])
                                        </div>
                                    </div>

                                    <div class="row">
                                        {{-- <label class="col-sm-4 col-form-label">{{ __('Proveedor') }}</label> --}}
                                        <div class="col-sm-12">
                                            <label class="form-label label-top-select">{{ __('Proveedor') }}</label>
                                            <select class="js-example-basic-single js-states form-control" name="proveedor_id" id="proveedor_id" data-style="select-with-transition" title="" data-size="100" style="width: 100%">
                                                <option value="" disabled selected style="background-color:lightgray">{{__('Seleccione un proveedor')}}</option>
                                                @foreach ($proveedores as $proveedor)
                                                    @if($proveedor->id==$ordenCompra->proveedor_id)
                                                    <option value="{{$proveedor->id}}" selected>{{ $proveedor->prov_nombre }}</option>
                                                    @else
                                                    <option value="{{$proveedor->id}}">{{ $proveedor->prov_nombre }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-label label-top">{{ __('Descuento') }} %</label>
                                            <input class="form-control" name="ord_descuento" id="ord_descuento" min="0"  max="100" type="number" onKeyPress= 'return positiveNumberH( this, event,this.value);' value="{{$ordenCompra->ord_descuento}}" placeholder="{{ __('Descuento') }}"/>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-check" style="margin-top: 20px">
                                                <input type="hidden" name="ord_iva_incluido" id="ord_iva_incluido" value="{{$ordenCompra->ord_iva_incluido}}">
                                                <label class="form-check-label">
                                                  <input class="form-check-input" type="checkbox" {{$ordenCompra->ord_iva_incluido?"checked":""}} id="aux_iva"> IVA incluido
                                                  <span class="form-check-sign">
                                                    <span class="check"></span>
                                                  </span>
                                                </label>
                                              </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label class="form-label label-top">{{ __('N° de Factura') }}:</label>
                                            <input class="form-control" name="ord_factura" id="ord_factura" type="text" placeholder="N° de Factura"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <button class="btn btn-success btn-sm" id="guardarFactura" type="button">
                                                <i class="material-icons">done</i>
                                                <div class="ripple-container"></div>
                                            </button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-8">

                                    <div class="card border mb-3" style="max-width: 100rem;">

                                        <div class="card-header bg-light" {{--style="border: dimgray 1px solid"--}}>
                                            <h4><b>Agregar materia prima</b></h4>
                                        </div>
                                    <div class="card-body text-dark border">
                                    {{-- fields --}}
                                    <div class="row breadcrumb">
                                        <div class="col-md-2">
                                            <input class="form-control" name="aux_cantidad" id="aux_cantidad" type="number" min="1" step="1" onKeyPress= 'return positiveNumber( this, event,this.value);' placeholder="cantidad"/>
                                        </div>

                                        <div class="col-md-2">
                                            <input class="form-control" name="aux_costo" id="aux_costo" type="number" min="0.01" step="0.01" onKeyPress= 'return positiveNumberH( this, event,this.value);' placeholder="costo"/>
                                        </div>
                                        {{-- <label class="col-sm-2 col-form-label">{{ __('Buscar') }}</label> --}}
                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <select class="js-example-basic-single js-states form-control" id="aux_material" data-style="select-with-transition" title="" data-size="100" style="width: 100%">
                                                    <option value="" disabled selected style="background-color:lightgray">{{__('Seleccione una materia prima')}}</option>
                                                    @foreach ($materiales as $material)
                                                    <option value="{{$material->id}}">{{ $material->mat_codigo}} {{ $material->mat_nombre }} {{ $material->empaque->emp_nombre}} {{ $material->mat_contenido}}{{ $material->medida->med_abreviatura}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-1 col-sm-1">
                                            <div class="row justify-content-center" style="margin-top: 9px;" >
                                                <a rel="tooltip" class="btn td-actions btn-success btn-sm btn-round
                                                btn-fab add" href="#" data-original-title=""
                                                   title="{{ __('Agregar') }}" id="agregarMateria">
                                                    <i class="material-icons">add</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="tablaMateriales" class="table table-striped table-no-bordered table-hover datatable-rose" style="width: 100%">
                                            <thead class="text-primary">
                                                <th>
                                                    {{ __('Material') }}
                                                </th>
                                                <th class="text-right">
                                                    {{ __('Cantidad') }}
                                                </th>
                                                <th class="text-right">
                                                    {{ __('Costo') }}
                                                </th>
                                                <th class="text-right">
                                                    {{ __('Total') }}
                                                </th>
                                                <th class="text-right">
                                                    {{ __('Acciones')}}
                                                </th>
                                            </thead>
                                            <tbody>
                                                @php
                                                $total=0;
                                            @endphp
                                            @foreach ($ordenCompra->materiaOrden as $materia)
                                                <tr>
                                                    <td>{{$materia->material->mat_codigo}} {{$materia->material->mat_nombre}} {{$materia->material->empaque->emp_nombre}} {{$materia->material->mat_contenido}}{{$materia->material->medida->med_abreviatura}}</td>
                                                    <td class="text-right">{{$materia->mo_cantidad}}</td>
                                                    <td class="text-right">{{number_format($materia->mo_costo,2,'.', ',')}}</td>
                                                    <td class="text-right">{{number_format(($materia->mo_cantidad*$materia->mo_costo),2,'.', ',')}}</td>
                                                    <td class='td-actions text-right'>
                                                        <button rel="tooltip" class="btn btn-warning btn-link editarLote" type="button">
                                                            <i class="material-icons">feedback</i>
                                                            <div class="ripple-container"></div>
                                                        </button>
                                                        <button rel="tooltip" class="btn btn-danger btn-link deleteMaterial" type="button">
                                                            <i class="material-icons">close</i>
                                                            <div class="ripple-container"></div>
                                                        </button>
                                                        <input type='hidden' name='material_id[]' value="{{$materia->material_id}}"/>
                                                        <input type='hidden' name='mo_cantidad[]' value="{{$materia->mo_cantidad}}"/>
                                                        <input type='hidden' name='mo_costo[]' value="{{$materia->mo_costo}}"/>
                                                        <input type='hidden' name='estado_fila[]' value='creado'/>
                                                        <input type='hidden' name='materia_orden_id[]' value='{{$materia->id}}'/>
                                                        <input type='hidden' name='mat_prov_lote[]' value=''/>
                                                        <input type='hidden' name='mat_prov_fecha_fabricacion[]' value=''/>
                                                        <input type='hidden' name='mat_prov_fecha_vencimiento[]' value=''/></td>
                                                </tr>
                                                @php
                                                    $total=$total+($materia->mo_costo*$materia->mo_cantidad);
                                                @endphp
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-7">
                                        </div>
                                        <input type="hidden" name="suma" id="suma" value="{{$total}}">
                                        <label class="col-sm-3 col-form-label lv" id="subtotal-l">Subtotal: $</label>
                                        <label class="col-sm-2 col-form-label lv" id="subtotal">{{number_format($total,2,'.', ',')}}</label>
                                        <div class="col-md-7">
                                        </div>
                                        <label class="col-sm-3 col-form-label lv" id="descuento-l">Descuento ({{$ordenCompra->ord_descuento}}%)</label>
                                        @php
                                            $valorDescuento=$total*($ordenCompra->ord_descuento/100);
                                        @endphp
                                        <label class="col-sm-2 col-form-label lv" id="descuento">-{{number_format($valorDescuento,2,'.', ',')}}</label>
                                        @php
                                            $totalActual=$total-round($valorDescuento,2);
                                            $iva=round($totalActual*0.13,2);
                                        @endphp
                                            <div class="col-md-7">
                                            </div>
                                            <label class="col-sm-3 col-form-label lv {{$ordenCompra->ord_iva_incluido?'d-none':''}}" id="iva-l">IVA (13%)</label>
                                            <label class="col-sm-2 col-form-label lv {{$ordenCompra->ord_iva_incluido?'d-none':''}}" id="iva">{{number_format($iva,2,'.', ',')}}</label>
                                        <div class="col-md-7">
                                        </div>
                                        <input type="hidden" name="ord_total" id="ord_total" value="{{$ordenCompra->ord_total}}">
                                        <label class="col-sm-3 col-form-label lv" id="total-l">Total</label>
                                        <label class="col-sm-2 col-form-label lv" id="total">{{number_format($ordenCompra->ord_total,2,'.', ',')}}</label>
                                    </div>
                                </div>
                                </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('ordenescompras.opciones.modallote')
</div>
@endsection

@push('js')
    <script>
        $("#proveedor_id,#aux_material").select2({
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
    <script src="{{ asset('js') }}/ordencomprafactura.js"></script>
@endpush
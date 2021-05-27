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
                            <h4 class="card-title">{{$tipo=="show"?__('Ver Orden de Compra'):__('Generar Factura por Compra') }}</h4>
                        </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('ordencompra.index') }}" class="btn btn-sm btn-info">{{ __('Regresar') }}</a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="row">
                                    <label class="col-sm-4 col-form-label">{{ __('N° de Orden') }}:</label>
                                    <label class="col-sm-8 col-form-label"><b>{{ $ordenCompra->ord_numero }}</b></label>
                                </div>
                                <div class="row">
                                    <label class="col-sm-4 col-form-label">{{ __('N° de Factura') }}:</label>
                                    <label class="col-sm-8 col-form-label"><b>{{ $ordenCompra->ord_factura }}</b></label>
                                </div>

                                <div class="row">
                                    <label class="col-sm-4 col-form-label">{{ __('Fecha') }}:</label>
                                    <label class="col-sm-8 col-form-label"><b>
                                        @php
                                            $aux = date_create($ordenCompra->ord_fecha);
                                        @endphp
                                        {{ date_format($aux,"d/m/Y") }}</b></label>
                                </div>

                                <div class="row">
                                    <label class="col-sm-4 col-form-label">{{ __('Proveedor') }}:</label>
                                    <label class="col-sm-8 col-form-label"><b>{{ $ordenCompra->proveedor->prov_nombre }}</b></label>
                                </div>

                                <div class="row">
                                    <label class="col-sm-4 col-form-label">{{ __('Estado') }}:</label>
                                    <label class="col-sm-8 col-form-label"><b>{{$ordenCompra->ord_estado?__('Efectuada'):__('Sin efectuar')}}</b></label>
                                </div>
                                @if($tipo=="factura")
                                <form action="{{ route('guardarmateriafactura') }}" method="post" id="formfactura" autocomplete="off">
                                    @csrf
                                    @method('post')
                                    <input type="hidden" name="id" value="{{$ordenCompra->id}}">
                                <div class="row">
                                    <label class="col-sm-4 col-form-label">{{ __('N° de Factura') }}:</label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                        <input class="form-control" name="ord_factura" id="ord_factura" type="text"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <button class="btn btn-success btn-sm" id="agregarFactura" type="button">
                                            <i class="material-icons">done</i>
                                            <div class="ripple-container"></div>
                                        </button>
                                    </div>
                                </div>
                                </form>
                                @endif
                            </div>
                            <div class="col-md-9">
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
                                        </thead>
                                        <tbody>
                                            @php
                                                $total=0;
                                            @endphp
                                            @foreach ($ordenCompra->materiaOrden as $materia)
                                                <tr>
                                                    <td>{{$materia->material->mat_nombre}}</td>
                                                    <td class="text-right">{{$materia->mo_cantidad}}</td>
                                                    <td class="text-right">{{number_format($materia->mo_costo,2,'.', ',')}}</td>
                                                    <td class="text-right">{{number_format(($materia->mo_cantidad*$materia->mo_costo),2,'.', ',')}}</td>
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
                                    @endphp
                                    @if(!$ordenCompra->ord_iva_incluido)
                                    @php
                                        $iva=round($totalActual*0.13,2);
                                    @endphp
                                        <div class="col-md-7">
                                        </div>
                                        <label class="col-sm-3 col-form-label lv" id="iva-l">IVA (13%)</label>
                                        <label class="col-sm-2 col-form-label lv" id="iva">{{number_format($iva,2,'.', ',')}}</label>
                                    @endif
                                    <div class="col-md-7">
                                    </div>
                                    <label class="col-sm-3 col-form-label lv" id="total-l">Total</label>
                                    <label class="col-sm-2 col-form-label lv" id="total">{{number_format($ordenCompra->ord_total,2,'.', ',')}}</label>
                                </div>
                            </div>
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
        $('#agregarFactura').click(function(){
            if ($('#ord_factura').val().trim() == '') 
                msmError("N° de Factura");
            else
                $('#formfactura').submit()
        })
    </script>
@endpush
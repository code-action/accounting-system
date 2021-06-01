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
                            <h4 class="card-title">{{ __('Nueva Orden de Compra') }}</h4>
                        </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('ordencompra.index') }}" class="btn btn-sm btn-info">{{ __('Regresar') }}</a>
                            </div>
                        </div>
                        <form method="post" action="{{ route('ordencompra.store') }}" autocomplete="off" class="form-horizontal" id="formOrden">
                            @csrf
                            @method('post')
                            <div class="row">
                                <div class="col-md-4">

                                    <div class="card border mb-3" style="max-width: 100rem;">

                                        <div class="card-header bg-light" {{--style="border: dimgray 1px solid"--}}>
                                            <h4><b>Agregar materia prima</b></h4>
                                        </div>
                                    <div class="card-body text-dark border">
                                    
                                    <div class="row">
                                        <div class="form-group bmd-form-group col-md-6">
                                            <label for="aux_cantidad" class="bmd-label-floating">Cantidad</label>
                                            <input class="form-control" name="aux_cantidad" id="aux_cantidad" type="number" min="1" step="1" onKeyPress= 'return positiveNumber( this, event,this.value);'/>
                                        </div>

                                        <div class="form-group bmd-form-group col-md-6">
                                            <label for="aux_costo" class="bmd-label-floating">Costo</label>
                                            <input class="form-control" name="aux_costo" id="aux_costo" type="number" min="0.01" step="0.01" onKeyPress= 'return positiveNumberH( this, event,this.value);'/>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">{{ __('Buscar') }}</label>
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <select class="js-example-basic-single js-states form-control" id="aux_material" data-style="select-with-transition" title="" data-size="100" style="width: 100%">
                                                    <option value="" disabled selected style="background-color:lightgray">{{__('Seleccione una materia prima')}}</option>
                                                    @foreach ($materiales as $material)
                                                        <option value="{{$material->id}}">{{ $material->mat_nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <button class="btn btn-info btn-sm" id="agregarMateria" type="button">
                                                <i class="material-icons">add_shopping_cart</i>
                                                <div class="ripple-container"></div>
                                            </button>
                                        </div>
                                        <div class="col-sm-3">
                                            <button class="btn btn-success btn-sm" id="guardarOrden" type="button">
                                                <i class="material-icons">done</i>
                                                <div class="ripple-container"></div>
                                            </button>
                                        </div>
                                    </div>
                                    </div>

                                </div>
                                <div class="col-md-8">

                                    <div class="card border mb-3" style="max-width: 100rem;">

                                        <div class="card-header bg-light" {{--style="border: dimgray 1px solid"--}}>
                                            <h4><b>Agregados</b></h4>
                                        </div>
                                    <div class="card-body text-dark border">

                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('N° de Orden') }}</label>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                <input class="form-control" name="ord_numero" id="ord_numero" type="text"/>
                                                @include('alerts.feedback', ['field' => 'ord_fecha'])
                                                </div>
                                            </div>
                                            <label class="col-sm-2 col-form-label">{{ __('Fecha') }}</label>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                <input class="form-control" name="ord_fecha" id="ord_fecha" type="date"/>
                                                @include('alerts.feedback', ['field' => 'ord_fecha'])
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('Proveedor') }}</label>
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <select class="js-example-basic-single js-states form-control" name="proveedor_id" id="proveedor_id" data-style="select-with-transition" title="" data-size="100" style="width: 100%">
                                                        <option value="" disabled selected style="background-color:lightgray">{{__('Seleccione un proveedor')}}</option>
                                                        @foreach ($proveedores as $proveedor)
                                                            <option value="{{$proveedor->id}}">{{ $proveedor->prov_nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('Descuento') }} %</label>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                <input class="form-control" name="ord_descuento" id="ord_descuento" min="0"  max="100" type="number" onKeyPress= 'return positiveNumberH( this, event,this.value);'/>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-check" style="margin-top: 20px">
                                                    <input type="hidden" name="ord_iva_incluido" id="ord_iva_incluido" value="1">
                                                    <label class="form-check-label">
                                                      <input class="form-check-input" type="checkbox" checked id="aux_iva"> IVA incluido
                                                      <span class="form-check-sign">
                                                        <span class="check"></span>
                                                      </span>
                                                    </label>
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
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-7">
                                        </div>
                                        <input type="hidden" name="suma" id="suma" value="0">
                                        <label class="col-sm-3 col-form-label lv" id="subtotal-l">Subtotal: $</label>
                                        <label class="col-sm-2 col-form-label lv" id="subtotal">0.00</label>
                                        <div class="col-md-7">
                                        </div>
                                        <label class="col-sm-3 col-form-label lv" id="descuento-l">Descuento (0%)</label>
                                        <label class="col-sm-2 col-form-label lv" id="descuento">-0.00</label>
                                        <div class="col-md-7">
                                        </div>
                                        <label class="col-sm-3 col-form-label lv d-none" id="iva-l">IVA (13%)</label>
                                        <label class="col-sm-2 col-form-label lv d-none" id="iva">0.00</label>
                                        <div class="col-md-7">
                                        </div>
                                        <input type="hidden" name="ord_total" id="ord_total" value="0">
                                        <label class="col-sm-3 col-form-label lv" id="total-l">Total</label>
                                        <label class="col-sm-2 col-form-label lv" id="total">0.00</label>
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
    <script src="{{ asset('js') }}/ordencompra.js"></script>
@endpush
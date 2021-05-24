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
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">{{ __('N° de Orden') }}</label>
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                            <input class="form-control" name="ord_numero" id="ord_numero" type="text"/>
                                            @include('alerts.feedback', ['field' => 'ord_fecha'])
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">{{ __('Fecha') }}</label>
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                            <input class="form-control" name="ord_fecha" id="ord_fecha" type="date"/>
                                            @include('alerts.feedback', ['field' => 'ord_fecha'])
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">{{ __('Proveedor') }}</label>
                                        <div class="col-sm-9">
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
                                        <label class="col-sm-3 col-form-label">{{ __('Cantidad') }}</label>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                            <input class="form-control" name="aux_cantidad" id="aux_cantidad" type="number"/>
                                            </div>
                                        </div>
                                        <label class="col-sm-2 col-form-label">{{ __('Costo') }}</label>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                            <input class="form-control" name="aux_costo" id="aux_costo" type="number"/>
                                            </div>
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
                                <div class="col-md-8">
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
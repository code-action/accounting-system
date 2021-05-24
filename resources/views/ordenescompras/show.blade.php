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
                            <h4 class="card-title">{{ __('Ver Orden de Compra') }}</h4>
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
                                            @foreach ($ordenCompra->materiaOrden as $materia)
                                                <tr>
                                                    <td>{{$materia->material->mat_nombre}}</td>
                                                    <td class="text-right">{{$materia->mo_cantidad}}</td>
                                                    <td class="text-right">{{number_format($materia->mo_costo,2,'.', ',')}}</td>
                                                    <td class="text-right">{{number_format(($materia->mo_cantidad*$materia->mo_costo),2,'.', ',')}}</td>
                                                </tr>
                                            @endforeach
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
</div>
@endsection
{{-- 
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
@endpush --}}
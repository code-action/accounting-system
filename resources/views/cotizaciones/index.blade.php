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
                            <h4 class="card-title">{{ __('Lista de Cotizaciones') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('cotizacion.create') }}" class="btn btn-sm btn-info">{{ __('Nueva') }}</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover datatable-rose" style="display:none; width: 100%">
                                    <thead class="text-info">
                                        <th >
                                            {{ __('Código') }}
                                        </th>
                                        <th >
                                            {{ __('Fecha') }}
                                        </th>
                                        <th >
                                            {{ __('Estado') }}
                                        </th>
                                        <th>
                                            {{ __('Cliente') }}
                                        </th>
                                        <th>
                                            {{ __('Total') }}
                                        </th>
                                        <th>
                                            {{ __('Email') }}
                                        </th>
                                        <th>
                                            {{ __('Teléfono') }}
                                        </th>
                                        <th class="text-right" style="width:140px;">
                                            {{ __('Acciones') }}
                                        </th>
                                    </thead>
                                    <tbody>
                                    @foreach ($cotizaciones as $cotizacion)
                                        <tr>
                                            <td>
                                                {{$cotizacion->cot_codigo}}
                                            </td>
                                            <td>
                                                {{date("d-m-Y", strtotime($cotizacion->cot_fecha))}}
                                            </td>
                                            <td>
                                                @if($cotizacion->cot_estado == 'Aceptada')
                                                        <span class="badge bg-success">Aceptada</span>
                                                    @elseif($cotizacion->cot_estado == 'Revision')
                                                        <span class="badge bg-primary">Revisión</span>
                                                    @elseif($cotizacion->cot_estado == 'Rechazada')
                                                        <span class="badge bg-danger">Rechazada</span>
                                                @endif

                                                {{--{{ $cotizacion->cot_estado == 1 ? 'Aceptado':''}}
                                                {{ $cotizacion->cot_estado == 2 ? 'Revisión':''}}
                                                {{ $cotizacion->cot_estado == 3 ? 'Rechazado':''}}--}}
                                            </td>
                                            <td>
                                                {{$cotizacion->cliente->cli_nombre}}
                                            </td>
                                            <td>
                                                {{ number_format($cotizacion->cot_total, 2, '.', ',')}}
                                            </td>
                                            <td>
                                                {{$cotizacion->cliente->cli_email}}
                                            </td>
                                            <td>
                                                {{$cotizacion->cliente->cli_telefono}}
                                            </td>

                                            <td class="td-actions text-right">
                                                <a rel="tooltip" class="btn btn-info btn-link"
                                                   {{-- href="{{ route('cotizacion.show', $cotizacion) }}"--}}
                                                   data-original-title="" title="{{ __('Ver')}}"
                                                   onclick="abrir_modal_ver('{{$cotizacion}}', '{{$cotizacion->productos}}',
                                                       '{{route('cotizacion.show', $cotizacion)}}')">
                                                    <i class="material-icons">assignment</i>
                                                </a>
                                                @if($cotizacion->cot_estado != 'Aceptada')
                                                    <a rel="tooltip" class="btn btn-default btn-link"
                                                      data-original-title="" title="{{ __('Facturar')}}"
                                                       onclick="abrir_modal_facturar('{{$cotizacion}}', '{{$cotizacion->productos}}',
                                                           '{{route('facturacion.crear', $cotizacion)}}')">
                                                        <i class="material-icons">credit_card</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    <a rel="tooltip" class="btn btn-success btn-link"
                                                       href="{{ route('cotizacion.edit', $cotizacion) }}"
                                                       data-original-title="" title="{{ __('Editar')}}">
                                                        <i class="material-icons">edit</i>
                                                    </a>

                                                    <a rel="tooltip" class="btn btn-danger btn-link"
                                                            onclick="abrir_modal_eliminar('{{$cotizacion}}', '{{$cotizacion->productos}}',
                                                            '{{route('cotizacion.destroy', $cotizacion)}}')"
                                                            data-original-title="" title="{{ __('Eliminar')}}">
                                                        <i class="material-icons">close</i>
                                                    </a>
                                                @endif
                                            </td>

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

@endsection

@section('modals')
    @include('cotizaciones.modalDestroy')
    @include('cotizaciones.modalShow')
    @include('cotizaciones.modalFacturacion')
@endsection




@push('js')
    <script src="{{asset('js/cotizaciones/index.js')}}"></script>

    <script>
        //$(document).ready(function() {
            $('#datatables').fadeIn(1100);
            $('#datatables').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Buscar contización",
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
                    { "orderable": false, "targets": 7 },
                ],
            });
        //});
    </script>
@endpush

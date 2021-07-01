@extends('layouts.app', ['activePage' => 'facturacion', 'titlePage' => __('Facturaciones')])

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">receipt_long</i>
                            </div>
                            <h4 class="card-title">{{ __('Lista de Facturaciones') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    {{--<a href="{{ route('facturacion.create') }}" class="btn btn-sm btn-info">{{ __('Nueva') }}</a>--}}
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover datatable-rose" style="display:none; width: 100%">
                                    <thead class="text-primary">
                                        <th>
                                            {{ __('Código') }}
                                        </th>
                                        <th>
                                            {{ __('Fecha') }}
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
                                        <th class="text-right">
                                            {{ __('Acciones') }}
                                        </th>
                                    </thead>
                                    <tbody>
                                    @foreach ($facturaciones as $facturacion)
                                        <tr>
                                            <td>
                                                {{$facturacion->fact_codigo}}
                                            </td>
                                            <td>
                                                {{date("d-m-Y", strtotime($facturacion->fact_fecha))}}
                                            </td>
                                            <td>
                                                {{$facturacion->cliente->cli_nombre}}
                                            </td>
                                            <td>
                                                {{$facturacion->fact_total}}
                                            </td>
                                            <td>
                                                {{$facturacion->cliente->cli_email}}
                                            </td>
                                            <td>
                                                {{$facturacion->cliente->cli_telefono}}
                                                {{--$cotizacion->cliente->cli_telefono--}}
                                            </td>
                                            <td class="td-actions text-right">

                                                <a rel="tooltip" class="btn btn-info btn-link"
                                                   {{-- href="{{ route('cotizacion.show', $cotizacion) }}"--}}
                                                   data-original-title="" title="{{ __('Ver') }}"
                                                   onclick="abrir_modal_ver_fact('{{$facturacion}}', '{{$facturacion->productos}}',
                                                       '{{route('cotizacion.show', $facturacion)}}')">
                                                    <i class="material-icons">assignment</i>
                                                </a>
                                                <a rel="tooltip" class="btn btn-success btn-link"
                                                   href="{{ route('facturacion.edit', $facturacion) }}" data-original-title=""
                                                   title="{{ __('Editar')}}">
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                </a>

                                                <a rel="tooltip" class="btn btn-danger btn-link"
                                                        onclick="abrir_modal_eliminar_fact('{{$facturacion}}', '{{$facturacion->productos}}',
                                                            '{{route('facturacion.destroy', $facturacion)}}')"
                                                        data-original-title="" title="{{ __('Eliminar')}}">
                                                    <i class="material-icons">close</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                {{-- @endcan --}}
                                                {{--
                                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this category?") }}') ? this.parentElement.submit() : ''">
                                                      <i class="material-icons">close</i>
                                                      <div class="ripple-container"></div>
                                                  </button>
                                                --}}
                                                {{--</form>--}}
                                            </td>
                                            {{-- @endcan --}}
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
    @include('facturaciones.modalDestroy')
    @include('facturaciones.modalShow')
@endsection
@push('js')

    <script src="{{asset('js/facturaciones/index.js')}}"></script>

    <script>
        $(document).ready(function() {
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
                    searchPlaceholder: "Buscar facturaciones",
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
                    { "orderable": false, "targets": 3 },
                ],
            });
        });
    </script>
@endpush

@extends('layouts.app', ['activePage' => 'facturacion', 'titlePage' => __('Facturaciones')])

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">fact_check</i>
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
                                                {{$facturacion->created_at->format('d-m-Y')}}
                                            </td>
                                            <td>
                                                {{$facturacion->cotizacion->cliente->cli_nombre}}
                                            </td>
                                            <td>
                                                {{$facturacion->fact_total}}
                                            </td>
                                            <td>
                                                {{$facturacion->cotizacion->cliente->cli_email}}
                                            </td>
                                            <td>
                                                {{$facturacion->cotizacion->cliente->cli_telefono}}
                                                {{--$cotizacion->cliente->cli_telefono--}}
                                            </td>
                                            {{-- @can('manage-items', App\User::class) --}}
                                            <td class="td-actions text-right">
                                                {{--<form action="{{ route('cotizacion.destroy', $cotizacion) }}" method="post">
                                                    @csrf
                                                    @method('delete')--}}

                                                {{-- @can('update', $proveedor) --}}
                                                <a rel="tooltip" class="btn btn-success btn-link"
                                                   href="{{ route('facturacion.edit', $facturacion) }}" data-original-title="" title="">
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                </a>

                                                <button rel="tooltip" class="btn btn-danger btn-link"
                                                        onclick="abrir_modal_eliminar('{{$facturacion->created_at->format('d-m-Y')}}',
                                                            '{{$facturacion->cotizacion->cliente->cli_nombre}}',
                                                            '{{route('facturacion.destroy', $facturacion)}}')"
                                                        data-original-title="" title="">
                                                    <i class="material-icons">close</i>
                                                    <div class="ripple-container"></div>
                                                </button>
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

    @include('facturaciones.modalDestroy')

@endsection
@push('js')

    <script type="text/javascript">
        function abrir_modal_eliminar(fecha, cliente, url){
            $('#form_eliminar_facturacion').prop('action', url)

            $('#fact_cli_nombre').text('')
            $('#fact_fecha').text('')

            $('#fact_cli_nombre').append(cliente)
            $('#fact_fecha').append(fecha)

            $('#eliminar_facturacion').modal('show');
            console.log(fecha, cliente)
        }
    </script>
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
                    searchPlaceholder: "Buscar proveedores",
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

@extends('layouts.app', ['activePage' => 'cliente', 'titlePage' => __('Clientes')])

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">contact_phone</i>
                            </div>
                            <h4 class="card-title">{{ __('Lista de clientes') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('cliente.create') }}" class="btn btn-sm btn-info">{{ __('Nuevo') }}</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover datatable-rose" style="display:none; width: 100%">
                                    <thead class="text-primary">
                                    <th>
                                        {{ __('Nombre') }}
                                    </th>
                                    <th>
                                        {{ __('Nombre Contacto') }}
                                    </th>
                                    <th>
                                        {{ __('Categoría de Contribuyente') }}
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
                                    @php
                                        $categorias=['Gran Contribuyente', 'Mediano Contribuyente', 'Otros Contribuyentes'];
                                    @endphp
                                    @foreach ($clientes as $cliente)
                                        <tr>
                                            <td>
                                                {{$cliente->cli_nombre}}
                                            </td>
                                            <td>
                                                {{$cliente->cli_contacto}}
                                            </td>
                                            <td>
                                                {{ $categorias[$cliente->cli_categoria-1]}}
                                            </td>
                                            <td>
                                                {{$cliente->cli_email}}
                                            </td>
                                            <td>
                                                {{$cliente->cli_telefono}}
                                            </td>
                                            <td class="td-actions text-right">

                                                <a rel="tooltip" class="btn btn-info btn-link"
                                                   data-original-title=""
                                                   title="{{ __('Ver') }}" onclick="abrir_modal_mostrar('{{$cliente}}',
                                                    '{{route('cliente.show', $cliente)}}')">
                                                    <i class="material-icons">assignment</i>
                                                    <div class="ripple-container"></div>
                                                </a>

                                                <a rel="tooltip" class="btn btn-success btn-link"
                                                   href="{{ route('cliente.edit', $cliente) }}" data-original-title=""
                                                   title="{{ __('Editar') }}">
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                <button rel="tooltip" class="btn btn-danger btn-link"

                                                        onclick="abrir_modal_eliminar('{{$cliente}}',
                                                            '{{route('cliente.destroy', $cliente)}}')"
                                                        data-original-title="" title="{{ __('Eliminar') }}">
                                                    <i class="material-icons">close</i>
                                                    <div class="ripple-container"></div>
                                                </button>

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
    @include('clientes.modalDestroy')
    @include('clientes.modalShow')
@endsection


@push('js')
    <script src="{{asset('js/clientes/index.js')}}"></script>
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
                    searchPlaceholder: "Buscar cliente",
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

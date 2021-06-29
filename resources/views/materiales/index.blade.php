@extends('layouts.app', ['activePage' => 'materiales', 'titlePage' => __('Materia Prima')])

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                          <i class="material-icons">storefront</i>
                        </div>
                        <h4 class="card-title">{{ __('Lista de Materia Prima') }}</h4>
                      </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-right">
                              <a href="{{ route('raw.create') }}" class="btn btn-sm btn-info">{{ __('Nuevo') }}</a>
                            </div>
                          </div>
                        <div class="table-responsive">
                            <table id="datatables" class="table" style="display:none; width: 100%">
                                <thead class=" text-info">
                                    {{--<th> ID </th>--}}
                                    <th> {{ __('Nombre') }} </th>
                                    <th> {{ __('Cantidad Total') }} </th>
                                    {{--<th> {{ __('Cantidades') }} </th>
                                    <th> {{ __('Precio U.') }} </th>
                                    <th>{{ __('Proveedor') }}</th>--}}
                                    <th> {{ __('F. Ingreso') }} </th>
                                    <th class="text-right">{{ __('Acciones') }}</th>
                                </thead>
                                <tbody>
                                @foreach($materials as $m)
                                    @php
                                        $m->mat_nombre=$m->mat_nombre.(!is_null($m->empaque)?" ".$m->empaque->emp_nombre." ":"").$m->mat_contenido.(!is_null($m->medida)?$m->medida->med_abreviatura:"");
                                    @endphp
                                        <tr>
                                            {{--<td> {{ $m->id }} </td>--}}
                                            <td> {{ $m->mat_nombre }}</td>
                                            <td>
                                                @php
                                                    $total_cantidad = 0;
                                                @endphp
                                                @foreach($m->proveedores as $p)
                                                    @php
                                                        $total_cantidad += $p->pivot->mat_prov_cantidad
                                                    @endphp
                                                @endforeach
                                                {{$total_cantidad}}
                                            </td>
                                            {{--<td>
                                                @foreach($m->proveedores as $p)
                                                    {{ $p->pivot->mat_prov_cantidad }}<br>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($m->proveedores as $p)
                                                    {{number_format($p->pivot->mat_prov_preciou, 2, '.', ',')}}<br>

                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($m->proveedores as $p)
                                                    {{$p->prov_nombre}}<br>
                                                @endforeach
                                            </td>--}}
                                            <td> {{ $m->created_at->format('d-m-Y') }} </td>
                                            <td class="td-actions text-right">
                                                <a rel="tooltip" class="btn btn-info btn-link"
                                                   data-original-title=""
                                                   title="" onclick="abrir_modal_mostrar('{{$m}}',
                                                    '{{route('cliente.show', $m)}}')">
                                                    <i class="material-icons">assignment</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('raw.edit', $m) }}"
                                                   data-original-title="" title="Editar">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <form class="d-inline" id="form-delete" action="{{ route('raw.destroy', $m->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" rel="tooltip" class="btn btn-danger btn-link" href="#" data-original-title="" title="Eliminar"
                                                            onclick="
                                                                return swal({
                                                                html: '{{ __('¿Desea eliminar la materia prima') }}'+' '+'<b>'+'{{$m->mat_nombre}}'+'?</b>',
                                                                showCancelButton: true,
                                                                reverseButtons : true,
                                                                confirmButtonText: '{{ __('Eliminar') }}',
                                                                cancelButtonText: '{{ __('Cancelar') }}',
                                                                confirmButtonClass: 'btn btn-danger',
                                                                cancelButtonClass: 'btn btn-default',
                                                                buttonsStyling: false
                                                                }).then((result) => {
                                                                if (result.value) {
                                                                submit();
                                                                }
                                                                });">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </form>
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
    @include('materiales.modalShow')
@endsection
@push('js')
    <script src="{{asset('js/materiales/index.js')}}"></script>
    <script>
        $(document).ready(function () {
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
                    searchPlaceholder: "Buscar materia prima",
                    "lengthMenu": 'Mostrar _MENU_ registros',
                    "info": 'Mostrando página _PAGE_ de _PAGES_',
                    "infoEmpty": 'No hay registros disponibles',
                    "zeroRecords": 'Registro no encontrado',
                    "infoFiltered": '(Total de registros filtrados _MAX_)',
                    "paginate": {
                        "next": 'siguiente',
                        "previous": 'anterior',
                        "first": 'primero',
                        "last": 'último'
                    },
                },
                "columnDefs": [{
                    "orderable": false,
                    "targets": [3]
                }, ],
            });
        });

    </script>
@endpush

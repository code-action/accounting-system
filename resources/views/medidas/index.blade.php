@extends('layouts.app', ['activePage' => 'medida', 'titlePage' => __('Unidades de Medida')])

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                          <i class="material-icons">insert_chart_outlined</i>
                        </div>
                        <h4 class="card-title">{{ __('Lista de Unidades de Medida') }}</h4>
                      </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-right">
                              <a href="{{ route('medida.create') }}" class="btn btn-sm btn-info">{{ __('Nuevo') }}</a>
                            </div>
                          </div>
                        <div class="table-responsive">
                            <table id="datatables" class="table" style="display:none; width: 100%">
                                <thead class=" text-info">
                                    <th> ID </th>
                                    <th> Nombre </th>
                                    <th> Abreviatura </th>
                                    <th class="text-right"> Acciones </th>
                                </thead>
                                <tbody>
                                    @foreach($medidas as $m)
                                        <tr>
                                            <td> {{ $m->id }} </td>
                                            <td> {{ $m->med_nombre }} </td>
                                            <td> {{ $m->med_abreviatura }} </td>
                                            <td class="td-actions text-right">
                                                <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('medida.edit', $m->id) }}" data-original-title="" title="Editar">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <form class="d-inline" id="form-delete" action="{{ route('medida.destroy', $m->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    {{-- @if($m->productos->count()<1) --}}
                                                    <button type="button" rel="tooltip" class="btn btn-danger btn-link" href="#" data-original-title="" title="Eliminar"
                                                    onclick="
                                                        return swal({
                                                        html: '{{ __('??Desea eliminar la unidad de medida') }}'+' '+'<b>'+'{{$m->med_nombre}}'+'?</b>',
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
                                                    {{-- @else
                                                    <a rel="tooltip" class="btn btn-danger btn-link" href="#" data-original-title="" title="No se puede eliminar">
                                                        <i class="material-icons">block</i>
                                                    </a>
                                                    @endif --}}
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

@push('js')
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
                searchPlaceholder: "Buscar categor??a",
                "lengthMenu": 'Mostrar _MENU_ registros',
                "info": 'Mostrando p??gina _PAGE_ de _PAGES_',
                "infoEmpty": 'No hay registros disponibles',
                "zeroRecords": 'Registro no encontrado',
                "infoFiltered": '(Total de registros filtrados _MAX_)',
                "paginate": {
                    "next": 'siguiente',
                    "previous": 'anterior',
                    "first": 'primero',
                    "last": '??ltimo'
                },
            },
            "columnDefs": [{
                "orderable": false,
                "targets": 2
            }, ],
        });
    });

</script>
@endpush

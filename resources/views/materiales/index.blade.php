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
                            <table id="datatables" class="table">
                                <thead class=" text-info">
                                    <th> ID </th>
                                    <th> Nombre </th>
                                    <th> Cantidad </th>
                                    <th> F. Ingreso </th>
                                    <th class="text-right"> Acciones </th>
                                </thead>
                                <tbody>
                                    @foreach($materials as $m)
                                        <tr>
                                            <td> {{ $m->id }} </td>
                                            <td> {{ $m->mat_nombre }} </td>
                                            <td> {{ $m->mat_cantidad }} </td>
                                            <td> {{ $m->created_at }} </td>
                                            <td class="td-actions text-right">
                                                <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('raw.edit', $m->id) }}" data-original-title="" title="Editar">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <form class="d-inline" id="form-delete" action="{{ route('raw.destroy', $m->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" rel="tooltip" class="btn btn-danger btn-link" href="#" data-original-title="" title="Eliminar">
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
                "targets": 3
            }, ],
        });
    });

</script>
@endpush

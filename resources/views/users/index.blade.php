@extends('layouts.app', ['activePage' => 'user', 'titlePage' => __('Usuarios')])

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                          <i class="material-icons">person</i>
                        </div>
                        <h4 class="card-title">{{ __('Lista de Usuarios') }}</h4>
                      </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-right">
                              <a href="{{ route('user.create') }}" class="btn btn-sm btn-info">{{ __('Nuevo') }}</a>
                            </div>
                          </div>
                        <div class="table-responsive">
                            <table id="datatables" class="table" style="display:none; width: 100%">
                                <thead class=" text-info">
                                    <th> ID </th>
                                    <th> Nombre </th>
                                    <th> Email </th>
                                    <th> F. Verificado </th>
                                    <th> F. Ingreso </th>
                                    <th class="text-right"> Acciones </th>
                                </thead>
                                <tbody>
                                    @foreach($users as $d)
                                        <tr>
                                            <td> {{ $d->id }} </td>
                                            <td> <b>{{ $d->name }}</b> </td>
                                            <td> {{ $d->email }} </td>
                                            <td> {{ $d->email_verified_at }} </td>
                                            <td> {{ $d->created_at }} </td>
                                            <td class="td-actions text-right">
                                                <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('user.edit', $d->id) }}" data-original-title="" title="Editar">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                @if(auth()->user()->email!=$d->email)
                                                <form class="d-inline" id="form-delete" action="{{ route('user.destroy', $d->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" rel="tooltip" class="btn btn-danger btn-link" href="#" data-original-title="" title="Eliminar"
                                                    onclick="
                                                        return swal({
                                                        html: '{{ __('¿Desea eliminar el usuario') }}'+' '+'<b>'+'{{$d->name}}'+'?</b>',
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
                                                @else
                                                <a rel="tooltip" class="btn btn-danger btn-link" href="#" data-original-title="" title="No se puede eliminar">
                                                    <i class="material-icons">block</i>
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
                searchPlaceholder: "Buscar usuario",
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

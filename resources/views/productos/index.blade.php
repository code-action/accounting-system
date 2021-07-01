@extends('layouts.app', ['activePage' => 'producto', 'titlePage' => __('Listado de productos')])

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">inventory_2</i>
                        </div>
                        <h4 class="card-title">{{ __('Lista de Productos') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-right">
                              <a href="{{ route('producto.create') }}" class="btn btn-sm btn-info">{{ __('Nuevo') }}</a>
                            </div>
                          </div>
                        <div class="table-responsive">
                            <table id="datatables" class="table" style="display:none; width: 100%">
                                <thead class=" text-info">
                                    <th> ID </th>
                                    <th>{{ __('Código') }}</th>
                                    <th> {{ __('Nombre') }}</th>
                                    <th>{{ __('Precio') }}</th>
                                    <th>{{ __('Cantidad') }}  </th>
                                    <th>{{ __('Presentación') }}</th>
                                    <th> {{ __('F. Ingreso') }}</th>
                                    <th class="text-right"> Acciones </th>
                                </thead>
                                <tbody>
                                    @foreach($productos as $p)
                                        <tr>
                                            <td> {{ $p->id }} </td>
                                            <td> {{ $p->prod_codigo }} </td>
                                            <td> {{ $p->prod_nombre }} </td>
                                            <td> {{number_format($p->prod_precio, 2, '.', ',')}} </td>
                                            <td> {{ $p->prod_cantidad }} </td>
                                            <td> {{ $p->empaque->emp_nombre }}
                                                {{ $p->prod_contenido }}
                                                {{ $p->medida->med_abreviatura }}
                                            </td>
                                            <td> {{date("d-m-Y", strtotime($p->created_at))}}</td>
                                            <td class="td-actions text-right">
                                                <form class="d-inline" {{--id="form-delete"--}}
                                                action="{{ route('producto.destroy', $p->id) }}" method="POST">
                                                    <a rel="tooltip" class="btn btn-info btn-link"
                                                    onclick="{{--showModal({{$p->id}});--}} abrir_modal_mostrar('{{$p}}')"
                                                    data-original-title="" title="{{ __('Ver') }}">
                                                     <i class="material-icons">assignment</i>
                                                    </a>
                                                    @if($p->validarUso($p->id))
                                                    <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('producto.edit', $p->id) }}" data-original-title="" title="Editar">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" rel="tooltip" class="btn btn-danger btn-link" href="#" data-original-title="" title="Eliminar"
                                                    onclick="
                                                    return swal({
                                                    html: '{{ __('¿Desea eliminar el producto') }}'+' '+'<b>'+'{{$p->prod_nombre}}'+'?</b>',
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
                                                    @else
                                                    <a rel="tooltip" class="btn btn-danger btn-link" href="#" data-original-title="" title="No se puede eliminar">
                                                        <i class="material-icons">block</i>
                                                    </a>
                                                    @endif
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
    @include('productos.modalShow')
@endsection

@push('js')
    <script src="{{asset('js/productos/index.js')}}"></script>

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
                searchPlaceholder: "Buscar producto",
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

    <script src="{{ asset('js') }}/productos.js"></script>

@endpush

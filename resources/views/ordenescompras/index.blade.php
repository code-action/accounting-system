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
                <h4 class="card-title">{{ __('Lista de Órdenes de Compra') }}</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-12 text-right">
                    <a href="{{ route('ordencompra.create') }}" class="btn btn-sm btn-info">{{ __('Nuevo') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table id="datatables" class="table table-striped table-no-bordered table-hover datatable-rose" style="display:none; width: 100%">
                    <thead class="text-info">
                        <th>
                          {{ __('N° de Orden') }}
                        </th>
                        <th>
                            {{ __('Fecha') }}
                        </th>
                        <th>
                            {{ __('Proveedor') }}
                        </th>
                        <th>
                            {{ __('Estado') }}
                        </th>
                        <th class="text-right">
                            {{ __('Acciones') }}
                        </th>
                    </thead>
                    <tbody>
                      @foreach($ordenesCompras as $orden)
                        <tr>
                            <td>{{ $orden->ord_numero}}</td>
                            <td>
                                @php
                                    $aux = date_create($orden->ord_fecha);
                                @endphp
                                {{ date_format($aux,"d/m/Y") }}
                            </td>
                            <td>
                                {{ $orden->proveedor->prov_nombre}}
                            </td>
                            <td>
                                {{$orden->ord_estado?__('Efectuada'):__('Sin efectuar')}}
                            </td>
                            <td class="td-actions text-right">
                                <form action="{{ route('ordencompra.destroy', $orden->id) }}" method="post">
                                @csrf
                                @method('delete')

                                    @if(!$orden->ord_estado)
                                        <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('ordencompra.edit', $orden) }}" data-original-title="" title="Editar">
                                        <i class="material-icons">edit</i>
                                        <div class="ripple-container"></div>
                                        </a>
                                        <a rel="tooltip" class="btn btn-primary btn-link" href="{{ asset('materiaprimafactura').'?id='.$orden->id }}" data-original-title="" title="Recibir">
                                          <i class="material-icons">receipt_long</i>
                                          <div class="ripple-container"></div>
                                        </a>
                                        <button type="button" rel="tooltip" class="btn btn-danger btn-link" href="#" data-original-title="" title="Eliminar"
                                        onclick="
                                          return swal({
                                          html: '{{ __('¿Desea eliminar la orden de compra número') }}'+' '+'<b>'+'{{$orden->ord_numero}}'+'?</b>',
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
                                        <a rel="tooltip" class="btn btn-info btn-link" href="{{ route('ordencompra.show', $orden->id) }}" data-original-title="" title="Ver">
                                          <i class="material-icons">assignment</i>
                                          <div class="ripple-container"></div>
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

@push('js')
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
          searchPlaceholder: "Buscar orden",
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
          { "orderable": false, "targets": 2 },
        ],
      });
    });
  </script>
@endpush

@extends('layouts.app', ['activePage' => 'proveedor', 'titlePage' => __('Proveedores')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">groups</i>
                </div>
                <h4 class="card-title">{{ __('Lista de Proveedores') }}</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-12 text-right">
                    <a href="{{ route('proveedor.create') }}" class="btn btn-sm btn-info">{{ __('Nuevo') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table id="datatables" class="table table-striped table-no-bordered table-hover datatable-rose" style="display:none; width: 100%">
                    <thead class="text-info">
                      <th>
                          {{ __('Nombre') }}
                      </th>
                      <th>
                        {{ __('Encargado') }}
                      </th>
                      <th>
                        {{ __('Teléfono') }}
                      </th>
                      <th>
                        {{ __('Email') }}
                      </th>
                        <th class="text-right">
                          {{ __('Acciones') }}
                        </th>
                    </thead>
                    <tbody>
                      @foreach($proveedores as $proveedor)
                        <tr>
                          <td>
                            {{ $proveedor->prov_nombre}}
                          </td>
                          <td>
                            {{ $proveedor->prov_encargado }}
                          </td>
                          <td>
                            {{ $proveedor->prov_telefono }}
                          </td>
                          <td>
                            {{ $proveedor->prov_email }}
                          </td>
                          {{-- @can('manage-items', App\User::class) --}}
                            <td class="td-actions text-right">
                              <form action="{{ route('proveedor.destroy', $proveedor) }}" method="post">
                                @csrf
                                @method('delete')
                                
                                {{-- @can('update', $proveedor) --}}
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('proveedor.edit', $proveedor) }}" data-original-title="" title="Editar">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" rel="tooltip" class="btn btn-danger btn-link" href="#" data-original-title="" title="Eliminar"
                                  onclick="
                                    return swal({
                                    html: '{{ __('¿Desea eliminar el proveedor') }}'+' '+'<b>'+'{{$proveedor->prov_nombre}}'+'?</b>',
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
@extends('layouts.app', ['activePage' => 'ubicacion', 'titlePage' => __('Listado de ubicaciones')])

@section('content')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPIRIX_oZr9-20tVcIco-3fBMvunTc45Q&callback=initMap&libraries=&v=weekly" async ></script>
<style>
    #cmap {
        height: 300px;
    }
</style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-rose">
                        <h4 class="card-title ">Mapa de ubicaciones</h4>
                    </div>
                    <div class="card-body">
                        <div id="cmap"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-warning">
                        <h4 class="card-title ">Ubicaciones</h4>
                        <p class="card-category"> Listado de ubicaciones </p>
                    </div>
                    <div class="card-body">
                        <div class="my-3">
                            <a href="{{ route('ubicacion.create') }}" class="btn btn-warning"><i class="material-icons">add</i> Nuevo</a>
                        </div>
                        <div class="table-responsive">
                            <table id="datatables" class="table">
                                <thead class=" text-warning">
                                    <th> ID </th>
                                    <th> Latitud </th>
                                    <th> Longitud </th>
                                    <th> Estado </th>
                                    <th> F. Creación </th>
                                    <th class="text-right"> Acciones </th>
                                </thead>
                                <tbody>
                                    @foreach($ubicaciones as $u)
                                        <tr>
                                            <td> {{ $u->id }} </td>
                                            <td> {{ $u->ubi_lat }} </td>
                                            <td> {{ $u->ubi_long }} </td>
                                            <td style="text-decoration: underline; color: #9e9e9e;"> {{ $u->statusLabel() }} </td>
                                            <td> {{ $u->created_at }} </td>
                                            <td class="td-actions text-right">
                                                <a rel="tooltip" class="btn btn-warning btn-link" href="{{ route('ubicacion.edit', $u->id) }}" data-original-title="" title="Editar">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <form class="d-inline" id="form-delete" action="{{ route('ubicacion.destroy', $u->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button style="border:none; transform: translateY(7px)" type="submit" rel="tooltip" class="<btn btn-danger btn-link" href="#" data-original-title="" title="Eliminar">
                                                        <i class="material-icons">delete_outline</i>
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
                searchPlaceholder: "Buscar material",
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

    function initMap() {
        const def = { lat: 13.7605975, lng: -89.1786549 };
        const map = new google.maps.Map(document.getElementById("cmap"), {
            zoom: 8,
            center: def,
        });
        @foreach($ubicaciones as $u)
            marker = new google.maps.Marker({ position: { lat: {{ $u->ubi_lat }}, lng: {{ $u->ubi_long }} }, map: map, });
        @endforeach
    }

</script>
@endpush

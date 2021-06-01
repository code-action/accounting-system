function abrir_modal_eliminar(cotizacion, productos, url){
    cotizacion = JSON.parse(cotizacion)
    productos = JSON.parse(productos)

    console.log(productos)
    $('#form_eliminar_cotizacion').prop('action', url)

    $('#cot_cli_nombre').text('')
    $('#cot_fecha').text('')

    //$('#cot_cli_nombre').append(cotizacion.cliente.cli_nombre)
    // DATOS DEL CLIENTE
    $('#cot_fecha').append(moment.parseZone(cotizacion.cot_fecha).format("DD-MM-YYYY"))
    $('#cli_nombre').text(cotizacion.cliente.cli_nombre)
    $('#cot_descripcion').text(cotizacion.cot_descripcion)
    $('#cli_email').text(cotizacion.cliente.cli_email)
    $('#cli_telefono').text(cotizacion.cliente.cli_telefono)

    // DATOS DE LA EMPRESA

    // LISTA DE PRODUCTOS COTIZADOS

    $('#cotizacion_delete').fadeIn(1100);
    var cotizacion_ver = $('#cotizacion_delete').DataTable({
        retrieve: true,
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Buscar productos",
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
        ],
    });



    cotizacion_ver.clear().draw()

    cotizacion_ver.draw()
    for (var i = 0; i < productos.length; i++) {

        cotizacion_ver.row.add([
            productos[i].prod_nombre,
            productos[i].pivot.cot_prod_cantidad,
            productos[i].pivot.cot_prod_preciou.toFixed(2),
            (productos[i].pivot.cot_prod_preciou * productos[i].pivot.cot_prod_cantidad).toFixed(2),
        ]).draw(false)
        $("#cotizacion_ver").resize()

        //console.log(totalAmountPC)
    }
    $('#eliminar_cotizacion').modal('show');
    //console.log(fecha, cliente, url)

    $('#cot_sumas').text(cotizacion.cot_sumas.toFixed(2))
}


function abrir_modal_ver(cotizacion, productos, url){
    cotizacion = JSON.parse(cotizacion)
    productos = JSON.parse(productos)

    console.log(cotizacion, productos)
    $('#form_eliminar_cotizacion').prop('action', url)

    $('#cot_cli_nombre').text('')
    $('#cot_fecha').text('')

    //$('#cot_cli_nombre').append(cotizacion.cliente.cli_nombre)
    // DATOS DEL CLIENTE
    $('#ver_cot_fecha').append(moment.parseZone(cotizacion.cot_fecha).format("DD-MM-YYYY"))
    $('#ver_cli_nombre').text(cotizacion.cliente.cli_nombre)
    $('#ver_cot_descripcion').text(cotizacion.cot_descripcion)
    $('#ver_cli_email').text(cotizacion.cliente.cli_email)
    $('#ver_cli_telefono').text(cotizacion.cliente.cli_telefono)

    // DATOS DE LA EMPRESA

    // LISTA DE PRODUCTOS COTIZADOS

    $('#cotizacion_show').fadeIn(1100);
    var cotizacion_ver = $('#cotizacion_show').DataTable({
        retrieve: true,
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Buscar productos",
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
        ],
    });



    cotizacion_ver.clear().draw()

    cotizacion_ver.draw()
    for (var i = 0; i < productos.length; i++) {

        cotizacion_ver.row.add([
            productos[i].prod_nombre,
            productos[i].pivot.cot_prod_cantidad,
            productos[i].pivot.cot_prod_preciou.toFixed(2),
            (productos[i].pivot.cot_prod_preciou * productos[i].pivot.cot_prod_cantidad).toFixed(2),
        ]).draw(false)
        $("#cotizacion_ver").resize()

        //console.log(totalAmountPC)
    }
    $('#ver_cotizacion').modal('show');
    //console.log(fecha, cliente, url)

    $('#ver_cot_sumas').text(cotizacion.cot_sumas.toFixed(2))
}

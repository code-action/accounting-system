function abrir_modal_eliminar(cotizacion, productos, url){
    cotizacion = JSON.parse(cotizacion)
    productos = JSON.parse(productos)

    // PONER URL PARA HACER POST, UPDATE, ETC
    $('#form_eliminar_cotizacion').prop('action', url)

    // DATOS DEL CLIENTE
    $('#cot_fecha').text(moment.parseZone(cotizacion.cot_fecha).format("DD-MM-YYYY"))
    $('#cli_nombre').text(cotizacion.cliente.cli_nombre)
    $('#cot_descripcion').text(cotizacion.cot_descripcion)
    $('#cli_email').text(cotizacion.cliente.cli_email)
    $('#cli_telefono').text(cotizacion.cliente.cli_telefono)

    // DATOS DE LA EMPRESA

    // LISTA DE PRODUCTOS COTIZADOS

    $('#cotizacion_delete').fadeIn(1100);
    var cotizacion_borrar = $('#cotizacion_delete').DataTable({
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
    listarProductos(cotizacion_borrar, productos)




    //console.log(fecha, cliente, url)

    // Colocando totales
    $('#eliminar_cot_sumas').text(cotizacion.cot_sumas.toFixed(2))
    $('#eliminar_cot_iva').text(cotizacion.cot_iva.toFixed(2))
    $('#eliminar_cot_subtotal').text(cotizacion.cot_subtotal.toFixed(2))
    $('#eliminar_cot_retencion').text(cotizacion.cot_retencion.toFixed(2))
    $('#eliminar_cot_total').text(cotizacion.cot_total.toFixed(2))

    $('#eliminar_cotizacion').modal('show');
}


function abrir_modal_ver(cotizacion, productos, url){
    cotizacion = JSON.parse(cotizacion)
    productos = JSON.parse(productos)

    // PONER URL PARA HACER POST, UPDATE, ETC
    // $('#form_ver_cotizacion').prop('action', url)  // No lleva action

    // COLOCAR DATOS DEL CLIENTE, LA EMPRESA Y TOTALES
    colocarDatos('ver', cotizacion)


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
    listarProductos(cotizacion_ver, productos)


    // MOSTRAR MODAL
    $('#ver_cotizacion').modal('show');
}



function abrir_modal_facturar(cotizacion, productos, url){
    cotizacion = JSON.parse(cotizacion)
    productos = JSON.parse(productos)

    // PONER URL PARA HACER POST, UPDATE, ETC
    $('#form_facturar_cotizacion').prop('action', url)

    // COLOCAR DATOS DEL CLIENTE, LA EMPRESA Y TOTALES
    colocarDatos('fact', cotizacion)

    // LISTA DE PRODUCTOS COTIZADOS
    $('#cotizacion_facturar').fadeIn(1100);
    var cotizacion_facturar = $('#cotizacion_facturar').DataTable({
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
    listarProductos(cotizacion_facturar, productos)

    // MOSTRAR TOTALES
    $('#facturar_cotizacion').modal('show');
}

// Lista los productos de de la cotización
function listarProductos(tabla, productos){
    tabla.clear().draw()
    for (var i = 0; i < productos.length; i++) {
        tabla.row.add([
            productos[i].prod_nombre,
            productos[i].pivot.cot_prod_cantidad,
            productos[i].pivot.cot_prod_preciou.toFixed(2),
            (productos[i].pivot.cot_prod_preciou * productos[i].pivot.cot_prod_cantidad).toFixed(2),
        ]).draw(false)
    }
}


function colocarDatos(prefijo, cotizacion){
    // DATOS DEL CLIENTE
    $('#'+prefijo+'_cot_fecha').text(moment.parseZone(cotizacion.cot_fecha).format("DD-MM-YYYY"))
    $('#'+prefijo+'_cli_nombre').text(cotizacion.cliente.cli_nombre)
    $('#'+prefijo+'_cot_descripcion').text(cotizacion.cot_descripcion)
    $('#'+prefijo+'_cli_email').text(cotizacion.cliente.cli_email)
    $('#'+prefijo+'_cli_telefono').text(cotizacion.cliente.cli_telefono)

    // COLOCANDO TOTALES
    $('#'+prefijo+'_cot_sumas').text(cotizacion.cot_sumas.toFixed(2))
    $('#'+prefijo+'_cot_iva').text(cotizacion.cot_iva.toFixed(2))
    $('#'+prefijo+'_cot_subtotal').text(cotizacion.cot_subtotal.toFixed(2))
    $('#'+prefijo+'_cot_retencion').text(cotizacion.cot_retencion.toFixed(2))
    $('#'+prefijo+'_cot_total').text(cotizacion.cot_total.toFixed(2))
}

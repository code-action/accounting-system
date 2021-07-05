function abrir_modal_ver_fact(facturacion, productos, url){
    facturacion = JSON.parse(facturacion)
    productos = JSON.parse(productos)

    //console.log(facturacion, productos)
    // ver_fact_fecha, ver_fact_cli_nombre, ver_fact_descripcion, ver_fact_cli_email, ver_fact_cli_telefono
    // ver_fact_sumas, ver_fact_iva, ver_fact_subtotal, ver_fact_retencion, ver_fact_total

    // PONER URL PARA HACER POST, UPDATE, ETC
    // $('#form_ver_cotizacion').prop('action', url)  // No lleva action

    // COLOCAR DATOS DEL CLIENTE, LA EMPRESA Y TOTALES
    colocarDatos('ver', facturacion)


    // LISTA DE PRODUCTOS COTIZADOS
    $('#facturacion_show').fadeIn(1100);
    var facturacion_show = $('#facturacion_show').DataTable({
        "scrollCollapse": true,
        scrollY: "18rem",
        info: false,
        paging: false,
        responsive: false,

        retrieve: true,
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
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
    listarProductos(facturacion_show, productos)


    // MOSTRAR MODAL
    $('#ver_facturacion').modal('show');
}



function abrir_modal_eliminar_fact(facturacion, productos, url){
    facturacion = JSON.parse(facturacion)
    productos = JSON.parse(productos)

    //console.log(url)

    // PONER URL PARA HACER POST, UPDATE, ETC
    $('#form_eliminar_facturacion').prop('action', url)

    // COLOCAR DATOS DEL CLIENTE, LA EMPRESA Y TOTALES
    colocarDatos('eliminar', facturacion)

    // DATOS DE LA EMPRESA

    // LISTA DE PRODUCTOS COTIZADOS

    $('#facturacion_delete').fadeIn(1100);
    var cotizacion_borrar = $('#facturacion_delete').DataTable({
        retrieve: true,
        "scrollCollapse": true,
        scrollY: "18rem",

        info: false,
        paging: false,
        responsive: false,
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
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

    $('#eliminar_facturacion').modal('show');
}


// Lista los productos de de la cotización
function listarProductos(tabla, productos){
    //console.log(productos)
    tabla.clear().draw()
    for (var i = 0; i < productos.length; i++) {
        tabla.row.add([
            productos[i].prod_nombre,
            productos[i].pivot.fact_prod_cantidad,
            productos[i].pivot.fact_prod_preciou.toFixed(2),
            (productos[i].pivot.fact_prod_total).toFixed(2),
        ]).draw(false)
    }
}

function colocarDatos(prefijo, factura){
    // DATOS DEL CLIENTE
    //console.log(prefijo, factura.fact_fecha)
    $('#'+prefijo+'_fact_fecha').text(moment.parseZone(factura.fact_fecha).format("DD-MM-YYYY"))
    $('#'+prefijo+'_fact_cli_nombre').text(factura.cliente.cli_nombre) // factura.cliente.cli_nombre
    // $('#'+prefijo+'_cot_descripcion').text(factura.cot_descripcion)
    $('#'+prefijo+'_fact_cli_email').text(factura.cliente.cli_email)
    $('#'+prefijo+'_fact_cli_telefono').text(factura.cliente.cli_telefono)

    // COLOCANDO TOTALES
    $('#'+prefijo+'_fact_sumas').text(factura.fact_sumas.toFixed(2))
    $('#'+prefijo+'_fact_iva').text(factura.fact_iva.toFixed(2))
    $('#'+prefijo+'_fact_subtotal').text(factura.fact_subtotal.toFixed(2))
    $('#'+prefijo+'_fact_retencion').text(factura.fact_retencion.toFixed(2))
    $('#'+prefijo+'_fact_total').text(factura.fact_total.toFixed(2))
}

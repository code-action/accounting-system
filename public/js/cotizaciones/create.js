$("#datatables").on('click', '.add_product', function () {
    // Campos que no se muestran en la tabla "Agregar Productos" estarán en campos ocultos
    // Validar existencias
    //console.log('id', $(this).parents('tr').find('td:eq(0)').find('input:eq(0)').val())
    id = parseInt($(this).parents('tr').find('td:eq(0)').find('input:eq(0)').val())
    producto = $(this).parents('tr').find('td:eq(0)').text().trim()
    cantidad = parseInt($(this).parents('tr').find('td:eq(1)').find('input:eq(0)').val())
    precioU = (parseFloat($(this).parents('tr').find('td:eq(2)').text().trim())).toFixed(2)
    precioT = (parseFloat(cantidad) * parseFloat(precioU)).toFixed(2)
    //console.log(id, producto, cantidad, precioU)

    var table = $('#datatables2').DataTable()
    table.draw()

    var agregado = verificarProdEnLista(id)
    //console.log(agregado)
    // agregado[0] si existe el producto en la cotización es true
    // agregado[1] si ya existe el producto, aquí devuelve la fila para actualizar
    if(!agregado[0]){ // Agregamos el producto que no está en la lista de la cotización
        table.row.add([
            producto + '<input type="hidden" value="'+id+'" id="prod_'+id+'">',
            cantidad + '<input type="hidden" value="'+cantidad+'" id="cant_'+id+'">',
            precioU + '<input type="hidden" value="'+precioU+'" id="prec_'+id+'">',
            precioT + '<input type="hidden" value="'+precioT+'" id="prect_'+id+'">' +
            '<input type="hidden" value="" id="precio_total">',
            '<button type="button" class="btn btn-danger btn-link del_product" data-original-title="" title="Eliminar"\n' + 'style="\n' +
            '    margin-top: 0px;\n' +
            '    margin-left: 0px;\n' +
            '    margin-right: 0px;\n' +
            '    margin-bottom: 0px;\n' +
            '    padding-top: 5px;\n' +
            '    padding-right: 5px;\n' +
            '    padding-bottom: 5px;\n' +
            '    padding-left: 5px;"' +
            'data-original-title="" title="">\n' +
            '<i class="material-icons">close</i>\n' +
            '<div class="ripple-container"></div>\n' +
            '</button>\n'
        ]).draw(false)
        $("#datatables2").resize();
    }else{ // Solo actualizamos los datos del producto que está en la cotización sumando la cantidad y calculando
        // el nuevo total
        actualizarProdEnLista(id, cantidad, agregado[1])
    }

    calcularTotales()
});

// Retorna si ha sido seleccionado un cliente y su categoria
function clienteSeleccionado(){
    seleccionado = false
    categoria = null
    idCliente = $('#input-cli_nombre').val()
    //console.log($('#input-cli_nombre').val())
    //console.log($('#cliente_'+$('#input-cli_nombre').val()).attr('categoria'))

    if ($('#input-cli_nombre').val()){
        seleccionado = true
        categoria = $('#cliente_'+idCliente).attr('categoria')
    }
    return [seleccionado, categoria]
}

// Calcular totales cuando se seleccione un cliente, si es gran contribuyente realizará el cálculo
$('#input-cli_nombre').on('change',function(){
    calcularTotales()
});

function calcularTotales(){
    filas = $('#datatables2').find('tbody').find('tr')
    //console.log('calcularTotales')

    var sumas = 0.0
    var iva = 0.0
    var subtotal = 0.0
    var retención = 0.0
    var total = 0.0


    if (!filas.find('td').hasClass('dataTables_empty')) {
        filas.each(function (i) {
            sumas = sumas + parseFloat($(this).find('#precio_total').parents('td').text().trim())
            // console.log(sumas)
        })
    }


    //console.log($('#input-cli_nombre').val())
    //console.log($('#cliente_'+$('#input-cli_nombre').val()).attr('categoria'))

    clienteSel = clienteSeleccionado()
    // clienteSeleccionado() funcion para saber si es 1: Gran Contribuyente, 2: Mediano Contribuyente, 3: Otros C.
    // Cálculos basados en la suma
    iva = sumas * 0.13
    subtotal = sumas + iva

    if(sumas > 113 || clienteSel[1] === '1')
        retención = sumas * 0.01

    total = sumas + iva - retención

    // Colocando valores
    $('#cot_sumas').text(sumas.toFixed(2))
    $('#cot_iva').text(iva.toFixed(2))
    $('#cot_subtotal').text(subtotal.toFixed(2))
    $('#cot_retencion').text(retención.toFixed(2))
    $('#cot_total').text(total.toFixed(2))

    $('#input_cot_sumas').val(sumas.toFixed(2))
    $('#input_cot_iva').val(iva.toFixed(2))
    $('#input_cot_subtotal').val(subtotal.toFixed(2))
    $('#input_cot_retencion').val(retención.toFixed(2))
    $('#input_cot_total').val(total.toFixed(2))

}

// Verificar si el producto ya ha sido agregado para sumar la cantidad
// retorna [boolean, id, cantidad] si ya existen el producto en la cotización
function verificarProdEnLista(idProdAdd){
    filas = $('#datatables2').find('tbody').find('tr')
    agregado = false
    var fila = 0
    filas.each(function (i) {
        if (filas.length === 1 && filas.find('td').hasClass('dataTables_empty')) { // No hay productos
            //console.log('if')
        }else{ // Hay al menos 1 producto
            idProdCot = parseInt($(this).find('td:eq(0)').find('input:eq(0)').val())
            idProdAdd = parseInt(idProdAdd)
            //console.log(idProdAdd, idProdCot)
            if(idProdCot === idProdAdd){ // El producto ya existe en la cotización
                agregado = true
                fila = $(this)
                //console.log('El PRODUCTO YA ESTÁ EN LISTA')
            }
        }
    })
    //console.log(agregado, fila)
    if(agregado)
        return [agregado, fila]
    else
        return [agregado, fila]
}

function actualizarProdEnLista(idProdAdd, cant, fila){
    // Valores actuales en la lista de cotizacion
    //console.log(fila)
    cantidad = parseInt(fila.find('#cant_' + idProdAdd).val())
    precioU = parseFloat(fila.find('#prec_' + idProdAdd).val())
    //console.log('FUNCION actualizarProdEnLista', cantidad, precioU)
    nuevaCantidad = cantidad + cant
    nuevoPrecioTotal = (nuevaCantidad * precioU).toFixed(2)
    console.log(cantidad, cant)


    // Agregando nuevos valores
    //console.log('fila a actualizar', fila.find('#cant_' + idProdAdd).parents('td').text(555))
    tdCant = fila.find('#cant_' + idProdAdd).parents('td')
    tdCant.empty()
    tdCant.append(nuevaCantidad + '<input type="hidden" value="'+nuevaCantidad+'" id="cant_'+idProdAdd+'">')

    tdPrecTotal = fila.find('#prect_' + idProdAdd).parents('td')
    tdPrecTotal.empty()
    tdPrecTotal.append(nuevoPrecioTotal + '<input type="hidden" value="'+nuevoPrecioTotal+'" id="prect_'+idProdAdd+'">'
        + '<input type="hidden" value="" id="precio_total">')
    //fila.find('#prec_' + idProdAdd).parents('td')
    //fila.find('#prectotal_' + idProdAdd).parents('td').text(nuevaCantidad * precioU)
}


$("#datatables2").on('click', '.del_product', function () {
    //debugger
    // Campos que no se muestran eb ka tabla "Agregar Productos" estarán en campos ocultos
    // Validar exitencias
    //console.log('hola', $(this).parents('tr').find('td:eq(1)').find('input:eq(0)').val())
    producto = $(this).parents('tr').find('td:eq(0)').text().trim()
    cantidad = $(this).parents('tr').find('td:eq(1)').find('input:eq(0)').val()
    precioU = $(this).parents('tr').find('td:eq(2)').text().trim()
    //console.log(producto, cantidad, precioU)

    var table = $('#datatables2').DataTable()
    fila = $(this).parents('tr')
    table.row(fila).remove().draw(false);

    filas = $('#datatables2').find('tbody').find('tr')
    if (filas.length === 1 && filas.find('td').hasClass('dataTables_empty')) { // No hay productos
        //console.log('if')
        reiniciarTotales()
    }else{ // Hay al menos 1 producto
        calcularTotales()
        //console.log('No')
    }
});

function reiniciarTotales(){
    // Pniendo a cero los valores totales
    $('#cot_sumas').text('0.00')
    $('#cot_iva').text('0.00')
    $('#cot_subtotal').text('0.00')
    $('#cot_retencion').text('0.00')
    $('#cot_total').text('0.00')
}

function guardar_datos_prod(url, titulo){
    //console.log('url', url)
    if(url)
        $('#form_guardar_cotizacion').prop('action', url)

    if(titulo == 'guardar'){
        $('#cot_guardar_titulo').text($('#guardar').text())
    }
    else if (titulo == 'facturar') {
        $('#cot_guardar_titulo').text($('#facturar').text())
    }


    filas = $('#datatables2').find('tbody').find('tr')
    modal_body_cot_guardar = $('#modal_body_cot_guardar')
    modal_body_cot_guardar.empty()
    valido = validarCotizacion()
    // console.log(valido)
    if (valido[0]) { // True si todos los campos se han llenado correctamente
        $('#cot_guardar').modal('show');
        filas.each(function (i) {
            id_producto = parseInt($(this).find('td:eq(0)').find('input:eq(0)').val()) // id del producto
            cantidad = parseInt($(this).find('td:eq(1)').text().trim()) // cantidad solicitada
            //console.log('Producto',  $(this).find('td:eq(0)').find('input:eq(0)').val())
            //console.log($(this).parents('tr').find('td:eq(0)'))

            modal_body_cot_guardar.append(
                '<input type="hidden" name="cot_id_prod[]" id="" value="'+id_producto+'">' + // id del producto
                '<input type="hidden" name="cot_cant[]" id="" value="'+cantidad+'">' // cantidad solicitada
            )
        })
        cot_cliente_id = parseInt($('#input-cli_nombre').val())
        cli_estado = $('#input-cli_estado').val()

        input_cot_sumas = parseFloat($('#input_cot_sumas').val())
        input_cot_iva = parseFloat($('#input_cot_iva').val())
        input_cot_subtotal = parseFloat($('#input_cot_subtotal').val())
        input_cot_retencion = parseFloat($('#input_cot_retencion').val())
        input_cot_total = parseFloat($('#input_cot_total').val())
        cot_descripcion = $('#cot_descripcion').val().trim()
        /*console.log('input_cot_sumas', input_cot_sumas, 'input_cot_iva', input_cot_iva,
            'input_cot_subtotal', input_cot_subtotal, 'input_cot_retencion', input_cot_retencion, 'input_cot_total', input_cot_total)*/

        modal_body_cot_guardar.append(
            '<input type="hidden" name="cot_cliente_id" id="" value="'+cot_cliente_id+'">'+ //id del cliente
            '<input type="hidden" name="cot_estado" id="" value="'+cli_estado+'">'+ // estado cotización
            '<input type="hidden" name="cot_descripcion" id="" value="'+cot_descripcion+'">'+ // descripción
            '<input type="hidden" name="input_cot_sumas" id="" value="'+input_cot_sumas+'">' + // sumas
            '<input type="hidden" name="input_cot_iva" id="" value="'+input_cot_iva+'">' + // iva
            '<input type="hidden" name="input_cot_subtotal" id="" value="'+input_cot_subtotal+'">' + // subtotal
            '<input type="hidden" name="input_cot_retencion" id="" value="'+input_cot_retencion+'">' + // retención
            '<input type="hidden" name="input_cot_total" id="" value="'+input_cot_total+'">' // total de la cotización
        )
    }

    mostrarMensajesError(valido[1]) // Mostrar errores o limpiar los campos
}

function abrir_modal_guardar(cliente){
    $('#cli_nombre').text('')
    $('#cli_nombre').append(cliente)
    $('#cot_guardar').modal('show');
    //console.log(url, cliente)
}

// Indica si los campos necesarios para guardar están completos e indica cuales hacen falta
function validarCotizacion(){
    //console.log('validacion', $('#input-cli_nombre').val())
    filas = $('#datatables2').find('tbody').find('tr')
    camposError = []
    camposCorrectos = true

    if ($('#input-cli_nombre').val() === null) {
        // console.log('Cliente sin seleccionar')
        camposError.push('cliente')
        camposCorrectos = false
    }

    if ($('#input-vend_nombre').val() === null) {
        // console.log('Vendedor sin seleccionar')
        camposError.push('vendedor')
        camposCorrectos = false;
    }

    if ($('#input-cli_estado').val() === null) {
        // console.log('Vendedor sin seleccionar')
        camposError.push('estado')
        camposCorrectos = false;
    }

    if (filas.find('td').hasClass('dataTables_empty')) {
        //console.log('Cotización sin productos')
        camposError.push('cotizacion')
        camposCorrectos = false;
    }
    //console.log(camposCorrectos, camposError)
    return [camposCorrectos, camposError];
}

function mostrarMensajesError(campos){
    // console.log(campos, campos.includes('cliente'))
    // includes devuelve true si el elemento está en el array
    if(campos.includes('cliente') === true){
        //console.log('Cliente sin seleccionar 2')
        //$('#input-cli_nombre-error').css({'display':'block'});
        $('#input-cli_nombre-error').css( "display", "inline" ).fadeOut(500).fadeIn(300);

    }else
        $('#input-cli_nombre-error').css({'display':'none'});

    if(campos.includes('vendedor') === true){
        //console.log('Vendedor sin seleccionar 2')
        $('#input-vend_nombre-error').css({'display':'block'});
    }else
        $('#input-vend_nombre-error').css({'display':'none'});

    if(campos.includes('estado') === true){
        //console.log('Cliente sin seleccionar 2')
        //$('#input-cli_nombre-error').css({'display':'block'});
        $('#input-cli_estado-error').css( "display", "inline" ).fadeOut(500).fadeIn(300);

    }else
        $('#input-cli_estado-error').css({'display':'none'});

    if(campos.includes('cotizacion') === true){
        $('#titulo_mensaje_error').text($('#mensaje_cot_incompleta').text())
        $('#mensaje_error').modal('show')
        //console.log('Cotización sin productos 2')
    }
}




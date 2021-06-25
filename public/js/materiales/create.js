
//add_mat_prov
var i = 0.0
$("#contenedor").on('click', '.add', function () {
    validado = validarLinea()
    if(validado[0]){
        //console.log('hola')
        //mat_cantidad[], id: i-mat_cantidad
        //mat_precio_u[], id: i-mat_precio_u
        //prov_nombre[], id: i-prov_nombre
        linea0 = $(this).parent().parent().parent()
        //console.log(linea0.find('#mat_cantidad1').val())
        lineaClone = $( "#add_mat_prov0" ).clone() // Linea oculta con botón de eliminar

        // Pasando valores a la fila clone
        //console.log(linea.find('#i-prov_nombre').attr("id"))


        // Cambiando id, value, removiendo disabled
        lineaClone.find('#i-mat_cantidad').attr({'id': "mat_cantidad" + i, 'value': linea0.find('#mat_cantidad1').val()})//.removeAttr("disabled")
        lineaClone.find('#i-mat_precio_u').attr({'id': "mat_precio_u" + i, 'value': linea0.find('#mat_precio_u1').val()})//.removeAttr("disabled")
        // Select
        lineaClone.find('#i-prov_nombre').attr('id', "prov_nombre" + i)//.removeAttr("disabled")
        lineaClone.find('#prov_nombre' + i).select2();
        lineaClone.find('#prov_nombre' + i).val(linea0.find('#select_prov_nombre1').val()).trigger('change.select2');

        // Llenando campos ocultos
        lineaClone.find('#i-mat_cantidad_o').attr({'id': "mat_cantidad_o" + i, 'value': linea0.find('#mat_cantidad1').val()}).removeAttr("disabled")
        lineaClone.find('#i-mat_preciou_o').attr({'id': "mat_preciou_o" + i, 'value': linea0.find('#mat_precio_u1').val()}).removeAttr("disabled")
        lineaClone.find('#i-prov_nombre_o').attr({'id': "prov_nombre_o" + i, 'value': linea0.find('#select_prov_nombre1').val()}).removeAttr("disabled")

        //console.log(a)
        //linea.find('#i-prov_nombre').append(options)
        //linea.find('#i-prov_nombre').attr('id', "prov_nombre" + i).removeAttr("disabled")//.append(options) ---------
        //$("prov_nombre" + i).append(options)

        lineaClone.attr('style', 'inline')


        // Reiniciar campos de entrada
        linea0.find('#mat_cantidad1').val('')
        linea0.find('#mat_precio_u1').val('')
        linea0.find('#select_prov_nombre1').val(null).trigger('change')


        $('#contenedor').append(lineaClone)
        //console.log(i)
        i++
    }
    mostrarMensajesError(validado[1])
})

$("#contenedor").on('click', '.delete', function () {
    id_eliminado = parseInt($(this).parent().parent().parent().find('#id_proveedor').val())
    //console.log(id_eliminado)
    if(id_eliminado){
        id_eliminadoClone =$('#id_eliminado').clone()
        //console.log()
        id_eliminadoClone.val(id_eliminado).removeAttr("disabled")
        $('#eliminados').append(id_eliminadoClone)
    }

    $(this).parent().parent().parent().remove();
})

function validarLinea(){
    //console.log('validacion', $('#input-cli_nombre').val())
    linea0 = $('#add_mat_prov1').parent().parent().parent()
    camposCorrectos = true
    camposError = []

    //console.log(linea0.find('#mat_cantidad1').val())
    if (linea0.find('#mat_cantidad1').val() === '' || linea0.find('#mat_cantidad1').val() < 0
        || !Number.isInteger(parseFloat(linea0.find('#mat_cantidad1').val()))) {
        //console.log('Cantidad sin seleccionar')
        camposError.push('cantidad')
        camposCorrectos = false
    }
    //console.log(linea0.find('#mat_precio_u1').val().length)

    if (linea0.find('#mat_precio_u1').val() === '' || linea0.find('#mat_precio_u1').val() < 0
        || linea0.find('#mat_precio_u1').val().length > 6) {
        //console.log('Precio sin seleccionar')
        camposError.push('preciou')
        camposCorrectos = false;
    }
    // linea0.find('#prov_nombre1').val()
    if ( linea0.find('#select_prov_nombre1').val() === null) {
        //console.log('Proveedor sin seleccionar')
        camposError.push('proveedor')
        camposCorrectos = false;
    }
    //console.log(camposCorrectos, camposError)
    return [camposCorrectos, camposError];
}



function mostrarMensajesError(campos) {
    // console.log(campos, campos.includes('cliente'))
    // includes devuelve true si el elemento está en el array
    if (campos.includes('cantidad') === true) {
        //console.log('Cliente sin seleccionar 2')
        //$('#input-cli_nombre-error').css({'display':'block'});
        $('#mat_cantidad1-error').css("display", "inline").fadeIn(300);//.fadeOut(500).fadeIn(300);
        $('#form-group-mat_cantidad1').addClass('has-danger')
    } else {
        $('#mat_cantidad1-error').css({'display': 'none'});
        $('#form-group-mat_cantidad1').removeClass('has-danger')
    }
    if (campos.includes('preciou') === true) {
        //console.log('Vendedor sin seleccionar 2')
        $('#mat_precio_u1-error').css({'display': 'block'});
        $('#form-group-mat_precio_u1').addClass('has-danger')
    } else {
        $('#mat_precio_u1-error').css({'display': 'none'});
        $('#form-group-mat_precio_u1').removeClass('has-danger')
    }
    if(campos.includes('proveedor') === true){
        //console.log('Cliente sin seleccionar 2')
        //$('#input-cli_nombre-error').css({'display':'block'});
        $('#prov_nombre1-error').css( "display", "inline" ).fadeIn(300)//.fadeOut(500).fadeIn(300);
        $('#form-group-select_prov_nombre1').addClass('has-danger')
    }else{
        $('#prov_nombre1-error').css({'display':'none'});
        $('#form-group-select_prov_nombre1').addClass('has-danger')
    }


    if(campos.includes('nombre_materia') === true){
        //console.log('Vendedor sin seleccionar 2')
        $('#i-mat_nombre-error').css({'display':'block'});
        $('#form-group-mat_nombre').addClass('has-danger')
    }else{
        $('#i-mat_nombre-error').css({'display':'none'});
        $('#form-group-mat_nombre').removeClass('has-danger')
    }


    if(campos.includes('sin_proveedor') === true){
        $('#titulo_mensaje_error').text($('#mensaje_sin_proveedores').text())
        $('#mensaje_error').modal('show')
        //console.log('Cotización sin productos 2')
    }
}

$("#footer").on('click', '.submit', function () {
    validado = validarSubmit()
    mostrarMensajesError(validado[1])
    if (validado[0]){
        //form_material
        $( "#form_material" ).submit();
    }

})
function validarSubmit(){
    camposCorrectos = true
    camposError = []

    //console.log(linea0.find('#mat_cantidad1').val())
    mat_nombre = $('#i-mat_nombre')
    if (mat_nombre.val() === '' || mat_nombre.val().length < 3) {
        //console.log('Materia sin nombre')
        camposError.push('nombre_materia')
        camposCorrectos = false
    }
    //debugger
    //contenedor
    //console.log('contenedor', $('#contenedor').children())//.length)
    // Que haya al menos 1 linea de cantidad, precio uni, y proveedor
    if($('#contenedor').children().length < 3) {
        //console.log('Sin proveedor')
        camposError.push('sin_proveedor')
        camposCorrectos = false
    }

    //console.log(camposCorrectos, camposError)
    return [camposCorrectos, camposError];
}


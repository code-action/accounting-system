categorias = ['Gran Contribuyente', 'Mediano Contribuyente', 'Otros Contribuyentes'];
function abrir_modal_eliminar(cliente, url){
    /*$('#form_eliminar_cliente').prop('action', url)

    $('#cli_nombre').text('')
    $('#cli_nombre').append(cliente)
    $('#eliminar_cliente').modal('show');*/
    //console.log(cliente, url)

    cliente = JSON.parse(cliente)

    $('#form_eliminar_cliente').prop('action', url)

    //$('#cli_nombre').text('')
    $('#input-cli_nombre-eliminar').val(cliente.cli_nombre)
    $('#input-cli_contacto-eliminar').val(cliente.cli_contacto)
    $('#input-cli_email-eliminar').val(cliente.cli_email)
    $('#input-cli_telefono-eliminar').val(cliente.cli_telefono)

    $('#input-cli_categoria-eliminar').val(categorias[cliente.cli_categoria-1])
    $('#input-cli_direccion-eliminar').val(cliente.cli_direccion)
    $('#input-cli_telefono-eliminar').val(cliente.cli_telefono)
    $('#input-cli_dui-eliminar').val(cliente.cli_dui)
    $('#input-cli_nit-eliminar').val(cliente.cli_nit)
    $('#input-cli_nrc-eliminar').val(cliente.cli_nrc)

    $('#eliminar_cliente').modal('show');
    //console.log(cliente, url)

}

function abrir_modal_mostrar(cliente, url){
    cliente = JSON.parse(cliente)

    //$('#form_eliminar_cliente').prop('action', url)

    //$('#cli_nombre').text('')
    $('#input-cli_nombre-mostrar').val(cliente.cli_nombre)
    $('#input-cli_contacto-mostrar').val(cliente.cli_contacto)
    $('#input-cli_email-mostrar').val(cliente.cli_email)
    $('#input-cli_telefono-mostrar').val(cliente.cli_telefono)

    $('#input-cli_categoria-mostrar').val(categorias[cliente.cli_categoria-1])
    $('#input-cli_direccion-mostrar').val(cliente.cli_direccion)
    $('#input-cli_telefono-mostrar').val(cliente.cli_telefono)
    $('#input-cli_dui-mostrar').val(cliente.cli_dui)
    $('#input-cli_nit-mostrar').val(cliente.cli_nit)
    $('#input-cli_nrc-mostrar').val(cliente.cli_nrc)

    $('#abrir_modal_mostrar').modal('show');
   // console.log(cliente, url)
}

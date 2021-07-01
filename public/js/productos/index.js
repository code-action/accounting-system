function abrir_modal_mostrar(producto){
    producto = JSON.parse(producto)
    console.log(producto)

    //$('#form_eliminar_cliente').prop('action', url)
    //$('#input-mat_nombre-mostrar').val(material.mat_nombre)
    //$('#input-fechai-mostrar').val(moment.parseZone(material.created_at).format("DD-MM-YYYY"))
    $('#input-prod_codigo-mostrar').val(producto.prod_codigo)
    $('#input-mat_nombre-mostrar').val(producto.prod_nombre)
    $('#input-mat_cantidad-mostrar').val(producto.prod_cantidad)
    $('#input-prod_precio-mostrar').val(producto.prod_precio)
    $('#input-prod_descripcion-mostrar').val(producto.prod_desc)
    $('#input-prod_procedimiento-mostrar').val(producto.prod_procedimiento)
    $('#input-prod_contenido-mostrar').val(producto.prod_contenido)

    //input-categoria_id
    $('#input-categoria_id-mostrar').select2().val(producto.categoria_id).trigger('change.select2');
    //$('#input-categoria_id').val(producto.categoria_id).trigger('change.select2');

    //input-prod_empaque-mostrar
    $('#input-prod_empaque-mostrar').select2().val(producto.empaque_id).trigger('change.select2');

    //prod_medida-mostrar
    $('#input-prod_medida-mostrar').select2().val(producto.medida_id).trigger('change.select2');

    $('#abrir_modal_mostrar').modal('show');
}

function abrir_modal_mostrar(material, url){
    material = JSON.parse(material)
    //console.log(material)

    //$('#form_eliminar_cliente').prop('action', url)
    $('#input-mat_codigo-mostrar').val(material.mat_codigo)
    $('#input-mat_nombre-mostrar').val(material.mat_nombre)
    $('#input-fechai-mostrar').val(moment.parseZone(material.created_at).format("DD-MM-YYYY"))
    var total = 0
    $('.add_mat_prov').remove()

    for(var i = 0; i < material.proveedores.length; i++) {
        var lineaClone = $('#add_mat_prov').clone()
        lineaClone.attr("id", "add_mat_prov" + i).addClass('add_mat_prov')
        // Poniendo valores a los campos

        lineaClone.find('#i-mat_cantidad-visible').val(material.proveedores[i].pivot.mat_prov_cantidad)
            .attr("id", "i-mat_cantidad-visible" + i)
        lineaClone.find('#i-mat_precio_u-visible').val((material.proveedores[i].pivot.mat_prov_preciou)
            .toFixed(2)).attr("id", "i-mat_precio_u-visible" + i)

        // Select
        lineaClone.find('#i-prov_nombre').attr("id", "i-prov_nombre" + i)//.removeAttr("disabled")

        lineaClone.find('#i-prov_nombre' + i).select2();
        lineaClone.find('#i-prov_nombre' + i).val(String(material.proveedores[i].id)).trigger('change.select2')

        lineaClone.removeClass('d-none')
        $('#contenedor').append(lineaClone)
        total += material.proveedores[i].pivot.mat_prov_cantidad
    }
    $('#input-total-mostrar').val(total)
    $('#abrir_modal_mostrar').modal('show');
}

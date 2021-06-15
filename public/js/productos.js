function showModal(producto_id) {
    $('#ver_facturacion').modal('show');
    routeRequest = $('#mainRoute').val()
    $.ajax({
        type: 'get',
        url: routeRequest + "producto/" + producto_id,
        // data: {
        //     producto_id: producto_id,
        // },
        success: function (r) {
            $('#p_nombre').text("")
            $('#p_nombre').append("<b>Producto </b>" + r.prod_nombre)
            $('#p_cantidad').text(r.prod_cantidad)
            $('#p_precio').text(formatNumber(r.prod_precio.toFixed(2)))
            $('#p_categoria').text(r.categoria.cat_nombre)
            $('#p_descripcion').text(r.prod_desc)
            tabla = $('#materia_show').find('tbody')
            tabla.find('tr').remove()
            $(r.materiales).each(function (key, value) {
                html = '<tr><td>' + value.material.mat_nombre + '</td><td>' + value.mat_prod_cantidad + '</td></tr>'
                tabla.append(html)
            })
        }
    });
}
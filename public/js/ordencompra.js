$('#agregarMateria').click(function () {
    if (validarAux()) {
        cantidad = parseFloat($('#aux_cantidad').val())
        costo = parseFloat($('#aux_costo').val()).toFixed(2)
        material_id = $('#aux_material').find('option:selected').val()
        text_material = $('#aux_material').find('option:selected').text()

        html = "<tr>" +
            "<td>" +
            text_material +
            "<input type='hidden' name='material_id[]' value='" + material_id + "'/>" +
            "</td>" +
            "<td class='text-right'>" +
            cantidad +
            "<input type='hidden' name='mo_cantidad[]' value='" + cantidad + "'/>" +
            "</td>" +
            "<td class='text-right'>" +
            costo +
            "<input type='hidden' name='mo_costo[]' value='" + formatNumber(costo) + "'/>" +
            "</td>" +
            "<td class='text-right'>" +
            formatNumber((costo * cantidad).toFixed(2)) +
            "</td>" +
            "<td class='text-right'>" +
            '<button rel="tooltip" class="btn btn-danger btn-link deleteMaterial" type="button">' +
            '<i class="material-icons">close</i>' +
            '<div class="ripple-container"></div>' +
            '</button>' +
            "</td>" +
            "</tr>";

        $('#tablaMateriales').find('tbody').append(html)

    }
    refreshActiveFunctions();
});
function validarAux() {
    if ($('#aux_cantidad').val().trim() == '') {
        msmError("cantidad");
        return false;
    }
    if ($('#aux_costo').val().trim() == '') {
        msmError("costo");
        return false;
    }
    if ($('#aux_material').find('option:selected').val() == "") {
        msmError("materia prima");
        return false;
    }
    return true;
}

$('#guardarOrden').click(function () {
    if (validarOrden()) { //validar campos de orden
        $('#formOrden').submit();
    }

});

function refreshActiveFunctions() {
    $(".deleteMaterial").unbind()
    $('.deleteMaterial').click(function () {
        $(this).parent('td').parent('tr').remove();
    });
}

function validarOrden() {
    if ($('#ord_numero').val().trim() == '') {
        msmError("N° de Orden");
        return false;
    }
    if ($('#ord_fecha').val().trim() == '') {
        msmError("fecha");
        return false;
    }
    if ($('#proveedor_id').find('option:selected').val() == "") {
        msmError("proveedor");
        return false;
    }
    if ($('#tablaMateriales').find('tbody').find('tr').length == 0) {
        msmError("No se han agregado <b>materiales</b> a la tabla", 1);
        return false;
    }
    return true;
}

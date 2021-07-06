$('#agregarMateria').click(function () {
    if (validarAux()) {
        cantidad = parseFloat($('#aux_cantidad').val())
        costo = parseFloat($('#aux_costo').val()).toFixed(2)
        material_id = $('#aux_material').find('option:selected').val()
        text_material = $('#aux_material').find('option:selected').text()

        html = "<tr class='added"+material_id+"'>" +
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
            "<input type='hidden' name='estado_fila[]' value='nuevo'/>" +
            "</td>" +
            "<td class='td-actions text-right'>" +
            '<button rel="tooltip" class="btn btn-danger btn-link deleteMaterial" type="button">' +
            '<i class="material-icons">close</i>' +
            '<div class="ripple-container"></div>' +
            '</button>' +
            "<input type='hidden' name='materia_orden_id[]' value=''/>" +
            "</td>" +
            "</tr>";

        $('#tablaMateriales').find('tbody').append(html)
        refreshTotal()
        msmInfo("Materia prima agregada")
    }
});
function validarAux(material_id) {
    if ($('.added'+$('#aux_material').find('option:selected').val()).length>0) {
        msmError("La materia prima ya fue agregada",1);
        return false;
    }
    if ($('#aux_cantidad').val().trim() == '') {
        msmError("cantidad");
        return false;
    } else if (parseFloat($('#aux_cantidad').val()) == 0) {
        msmError("cantidad");
        return false;
    }
    if ($('#aux_costo').val().trim() == '') {
        msmError("costo");
        return false;
    } else if (parseFloat($('#aux_costo').val()) == 0) {
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
    console.log("refresh")
    $(".deleteMaterial").unbind()
    $('.deleteMaterial').click(function () {
        if ($(this).parent('td').parent('tr').find('input:eq(3)').val() == "nuevo")
            $(this).parent('td').parent('tr').remove();
        else {
            $(this).parent('td').parent('tr').removeClass();
            $(this).parent('td').parent('tr').find('input:eq(3)').val("eliminado")
            $(this).parent('td').parent('tr').addClass('d-none')
        }
        refreshTotal()
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

function refreshTotal() {
    filas = $('#tablaMateriales').find('tbody').find('tr')
    total = 0;
    $(filas).each(function () {
        if ($(this).find('input:eq(3)').val() != "eliminado") {
            cantidad = parseFloat($(this).find('input:eq(1)').val())
            costo = parseFloat($(this).find('input:eq(2)').val())
            total = total + (cantidad * costo)
        }
    })
    $('#subtotal').text(formatNumber(total.toFixed(2)))
    $('#suma').val(total.toFixed(2))
    actualizarPorcentajes()
}

function actualizarPorcentajes() {
    descuento = $('#ord_descuento').val()
    if (descuento.trim() == "")
        descuento = 0;
    else
        descuento = parseFloat(descuento)

    $('#descuento-l').text("Descuento (" + descuento + "%)")
    valorDescuento = ((descuento / 100) * parseFloat($('#suma').val())).toFixed(2)
    $('#descuento').text("-" + formatNumber(valorDescuento))

    if ($('#ord_iva_incluido').val() == "1") {
        $('#iva-l,#iva').addClass('d-none')
        $('#total').text(formatNumber((parseFloat($('#suma').val()) - valorDescuento).toFixed(2)))
        $('#ord_total').val((parseFloat($('#suma').val()) - valorDescuento).toFixed(2))
    } else {
        $('#iva-l,#iva').removeClass('d-none')
        valorIva = (0.13 * (parseFloat($('#suma').val()) - valorDescuento))
        $('#iva').text(formatNumber(valorIva.toFixed(2)))
        auxSuma = parseFloat($('#suma').val()) - valorDescuento + valorIva
        $('#total').text(formatNumber(auxSuma.toFixed(2)))
        $('#ord_total').val(auxSuma.toFixed(2))
    }
}

$('#aux_iva').click(function () {
    if ($('#ord_iva_incluido').val() == "1") {
        $('#ord_iva_incluido').val('0')
    }
    else {
        $('#ord_iva_incluido').val('1')
    }
    actualizarPorcentajes()
})

$('#ord_descuento').click(function () {
    actualizarPorcentajes()
})
$('#ord_descuento').keyup(function () {
    actualizarPorcentajes()
})

refreshActiveFunctions()
let timeout
$('#modal-filtrar').keyup(function(){
    clearTimeout(timeout)
    timeout = setTimeout(() => {
      filtrar(this)
      clearTimeout(timeout)
    },1000)  
})
function filtrar(field){
    if($(field).val().trim()!=""){
        $('#tabla-filtro').find('tbody').find('tr').remove()
        routeRequest = $('#mainRoute').val() + "materiaprimafiltro"
        $.ajax({
            type: 'get',
            url: routeRequest,
            data: {
                buscar: $(field).val(),
            },
            success: function (r) {
                $(r).each(function (key, value){
                    html=
                        "<tr>"+
                        "<td>"+value.mat_codigo+"</td>"+
                        "<td>"+value.mat_nombre+" "+value.emp_nombre+" "+value.mat_contenido+value.med_abreviatura+"</td>"+
                        "<td class='td-actions text-right'>"+
                        '<button type="button" rel="tooltip" class="btn btn-info agregarMateria" href="#" data-original-title="" title="Eliminar">'+
                        '<i class="material-icons">add</i></button>'+
                        "<input value='"+value.id+"' type='hidden'/>"+
                        "</td>"+
                        "</tr>"
                        $('#tabla-filtro').find('tbody').append(html)  
                })
                refreshActiveFunctions();
            }
        })
    }else{
        $('#tabla-filtro').find('tbody').find('tr').remove()
    }
}

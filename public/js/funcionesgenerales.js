function formatNumber(value) {
    // if ($('#hswitchRound').val() == '0') {
    v_t = value.split('.');
    const options2 = { style: 'decimal', currency: 'USD', maximumFractionDigits: 0 };
    const numberFormat2 = new Intl.NumberFormat('en-US', options2);
    return (numberFormat2.format(v_t[0])) + "." + v_t[1];
    // } else {
    //     myFloat = parseFloat(value)
    //     myFloat = Math.round(myFloat)
    //     const options2 = { style: 'decimal', currency: 'USD' };
    //     const numberFormat2 = new Intl.NumberFormat('en-US', options2);
    //     return (numberFormat2.format(myFloat));
    // }
}
function msmError(field, type = 0) {
    if (type)
        msm = field;
    else
        msm = "El campo <b>" + field + "</b> es obligatorio."
    $.notify({
        icon: "add_alert",
        message: msm
    }, {
        type: "danger",
        timer: 3000,
        placement: {
            from: "top",
            align: "right"
        }
    });
}

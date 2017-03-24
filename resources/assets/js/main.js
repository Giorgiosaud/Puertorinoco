$(document).ready(function () {
    $('.datePicker').datepicker({
        format: "DD, d MM , yyyy",
        autoclose: true,
        clearBtn: true,
        language: 'es',
        startDate:new Date(),
                altField: "#fecha",
                todayBtn:true,
                todayHighlight:true,
                altFormat: "yy-mm-dd"
            });
    if($('#formularioDeReserva').length>=1) {
        $.ajaxSetup({
            headers: {
                'X-XSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(window).keydown(function (event) {
            if (event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });

        $('#incio').on('slide.bs.carousel', function (e) {
            console.log(e.relatedTarget);
        });
        if ($('input[name="errores"]').length == 1) {
            $("#ayudaIdentificacion, #ayudaEmbarcacion, #ayudaPaseo, #ayudaFecha, #tipoEmbarcacion, #fechaform, #horaform, #cedulaForm, #nombresForm, #apellidosForm, #emailForm, #telefonoForm, #datosdePrecios, #datosdeCupos, #SaldosyMontos, #groupcondiciones,#botonEnviarForm").slideDown('fast');
            $('.loading,.alert.alert-success').slideUp('slow');
            $("input[name='embarcacion_id']:checked").parent().addClass('active');
            $("input[name='paseo_id']").parent().removeClass('disabled hidden');
            $("input[name='paseo_id']:checked").parent().addClass('active');
            if ($("input[name='fecha']").val().length > 0) {
                $.get("../ObtenerVariables/" + $("input[name='fecha']").val(), function (datosconfecha) {

                    window.datosconfecha = datosconfecha;
                    cantidad_en_embarcacion = [];
                    for (key in window.datosconfecha.pasajeros) {
                        cantidad_en_embarcacion[key] = parseInt(0);
                        for (key2 in window.datosconfecha.pasajeros[key]) {
                            cantidad_en_embarcacion[key] = cantidad_en_embarcacion[key] + window.datosconfecha.pasajeros[key][key2].disponibles;
                        }
                        if (cantidad_en_embarcacion[key] > 0) {
                            $("input[name='embarcacion_id'][value=" + key + "]").parent().removeClass('disabled hidden');
                        }
                    }
                    $('#fechaform').children('.col-xs-1').children().slideUp('slow');
                    if ($("input[name='embarcacion_id']").is(":checked")) {
                        embarcacion_id_seleccionada = $("input[name='embarcacion_id']:checked").val();
                        for (key in window.datosconfecha.pasajeros[embarcacion_id_seleccionada]) {
                            if (window.datosconfecha.pasajeros[embarcacion_id_seleccionada][key].disponibles > 0) {
                                $("input[name='paseo_id'][value=" + key + "]").siblings('.cupos').html(window.datosconfecha.pasajeros[embarcacion_id_seleccionada][key].disponibles + ' Pasaje(s)</br> Disponibles').parent().removeClass('disabled hidden');
                            }

                        }
                        if ($("input[name='paseo_id']").is(":checked")) {
                            paseo_id_seleccionada = $("input[name='paseo_id']:checked").val();
                            $('span#precioAdultos').text(window.datosconfecha.precios[paseo_id_seleccionada][0].adulto + ' Bs');
                            $('#precioMayores').text(window.datosconfecha.precios[paseo_id_seleccionada][0].mayor + ' Bs');
                            $('#precioNinos').text(window.datosconfecha.precios[paseo_id_seleccionada][0].nino + ' Bs');
                        }
                        else {
                            $('#ayudaPaseo').slideDown('slow');
                        }
                    }
                    else {
                        $('#ayudaEmbarcacion').slideDown('slow');
                    }

                });
}


}
$.get("../ObtenerVariables", function (datos) {
    window.diasNoLaborables = datos.diasNoLaborables;
    window.minimoDiasAReservar = datos.minReservar;
    window.fechasEspeciales = datos.fechasEspeciales;
    window.temporadaBaja = datos.temporadaBaja;
    if ($("input[name='fecha']").val().length == 0) {
        $('#ayudaFecha').slideDown('slow');
    }
    $('#fechaform').slideDown('slow');
    $('#loadingFormulario').slideUp('slow');
    $('#fecha2').datepicker({
        format: "DD, d MM , yyyy",
        autoclose: true,
        clearBtn: true,
        daysOfWeekDisabled: window.diasNoLaborables,
        language: 'es',
        startDate:new Date(),
                //startDate: new Date(new Date().setDate((new Date()).getDate() + parseInt(window.minimoDiasAReservar))),
                beforeShowDay: fechasEspecialesx,
                altField: "#fecha",
                todayBtn:true,
                todayHighlight:true,
                altFormat: "yy-mm-dd"

            }).on('changeDate', function (e) {
                $('#tipoEmbarcacion').slideUp('slow');
                $('#ayudaEmbarcacion').slideUp('slow');
                $('#datosdePrecios').slideUp('slow');

                $('#horaform').slideUp('slow');
                $('#ayudaFecha').slideUp('slow');
                $('.loading').slideDown('slow');
                $("input[name='embarcacion_id']").removeAttr('checked').parent().removeClass('active').addClass('hidden disabled');
                $("input[name='paseo_id']").removeAttr('checked').siblings('.cupos').html('').parent().removeClass('active').addClass('disabled hidden')
                $('#fechaform').children('.col-xs-1').children().slideDown('slow');
                $('#fecha').val((e.format(0, 'yyyy-mm-dd')));
                $.get("../ObtenerVariables/" + e.format(0, 'yyyy-mm-dd'), function (datosconfecha) {
                    console.info(datosconfecha);
                    window.datosconfecha = datosconfecha;
                    cantidad_en_embarcacion = [];
                    for (key in window.datosconfecha.pasajeros) {
                        cantidad_en_embarcacion[key] = parseInt(0);
                        for (key2 in window.datosconfecha.pasajeros[key]) {
                            cantidad_en_embarcacion[key] = cantidad_en_embarcacion[key] + window.datosconfecha.pasajeros[key][key2].disponibles;
                        }
                        if (cantidad_en_embarcacion[key] > 0) {
                            $("input[name='embarcacion_id'][value=" + key + "]").parent().removeClass('disabled hidden');
                        }
                    }
                    $('#fechaform').children('.col-xs-1').children().slideUp('slow');
                    $('.loading').slideUp('slow');

                    $('#tipoEmbarcacion,#ayudaEmbarcacion').slideDown('slow');
                });
});
}, "json");
$("input[name='embarcacion_id']").on("change", function () {
    embarcacion_id_seleccionada = $("input[name='embarcacion_id']:checked").val();
    $("input[name='paseo_id']").removeAttr('checked').parent().removeClass('active').addClass('disabled hidden');
    for (key in window.datosconfecha.pasajeros[embarcacion_id_seleccionada]) {
        if (window.datosconfecha.pasajeros[embarcacion_id_seleccionada][key].disponibles > 0) {
            $("input[name='paseo_id'][value=" + key + "]").siblings('.cupos').html(window.datosconfecha.pasajeros[embarcacion_id_seleccionada][key].disponibles + ' Pasaje(s)</br> Disponibles').parent().removeClass('disabled hidden');
        }
    }
    $('#ayudaEmbarcacion').slideUp('slow');
    $('#horaform,#ayudaPaseo').slideDown('slow');
});
$("input[name='paseo_id']").on("change", function () {
    paseo_id_seleccionada = $("input[name='paseo_id']:checked").val();
    window.disponible = window.datosconfecha.pasajeros[embarcacion_id_seleccionada][paseo_id_seleccionada].disponibles;
    $('#ayudaPaseo').slideUp('slow');
    $('span#precioAdultos').text(window.datosconfecha.precios[paseo_id_seleccionada][0].adulto + ' Bs');
    $('#precioMayores').text(window.datosconfecha.precios[paseo_id_seleccionada][0].mayor + ' Bs');
    $('#precioNinos').text(window.datosconfecha.precios[paseo_id_seleccionada][0].nino + ' Bs');
    $('#datosdePrecios').slideDown('slow');
    $('#cedulaForm').slideDown('slow');

    if ($("input[name='identificacion_number']").val() == '') {
        $('#ayudaIdentificacion').slideDown('slow');
    }
});
$('#validarId').on('click', function () {
    $('input[name="identificacion"]').val($('select[name="rifInicio"]').val() + "-" + $("input[name='identificacion_number']").val());
    $('#validarId').children('.glyphicon').removeClass('glyphicon-ok').addClass('glyphicon-refresh glyphicon-refresh-animate');
    $('#advertencias').modal('show');
    $.get("../ObtenerDatosClientes/" + $('[name="identificacion"]').val(), function (datosCliente) {

        window.datosCliente = datosCliente;
        $('#nombre').val(datosCliente.nombre);
        $('#apellido').val(datosCliente.apellido);
        $('#email').val(datosCliente.email);
        $('#telefono').val(datosCliente.telefono);
        $('.datosInternosCliente').slideDown('slow');
        $('#ayudaIdentificacion').slideUp('slow');
        $('.datosInternosCliente').slideDown('slow', function () {
            $('#datosdeCupos').slideDown('slow');
        });
        $('#validarId').children('.glyphicon').addClass('glyphicon-ok').removeClass('glyphicon-refresh glyphicon-refresh-animate');

    });
});
$('.numeroDeCupos').change(function (event) {
    paseo_id_seleccionada = $("input[name='paseo_id']:checked").val();
    pasajesAdultos = parseInt($('#pasajesadultos').val()) || 0;
    pasajesMayores = parseInt($('#3eraEdad').val()) || 0;
    pasajesNinos = parseInt($('#ninos').val()) || 0;
    actual = parseInt($(this).val()) || 0;
    if (pasajesAdultos + pasajesMayores == 0) {
        $('#ninos').val(0);
    }
    totalPasajes = pasajesAdultos + pasajesMayores + pasajesNinos;
    maximoActual = window.disponible - totalPasajes + actual;
    $('.numeroDeCupos').attr('max', maximoActual);
    if (totalPasajes >= (window.disponible + 1)) {
        $(this).val(0);
    }
    precioAdultos = window.datosconfecha.precios[paseo_id_seleccionada][0].adulto;
    precioMayor = window.datosconfecha.precios[paseo_id_seleccionada][0].mayor;
    precioNino = window.datosconfecha.precios[paseo_id_seleccionada][0].nino;
    totalReserva = (pasajesAdultos * precioAdultos) + (pasajesMayores * precioMayor) + (pasajesNinos * precioNino);
    saldoAFavor = window.datosCliente.credito;
    montoAPagar = (totalReserva <= saldoAFavor) ? 0 : totalReserva - saldoAFavor;
    $('#Giftcards').html(saldoAFavor + ' Bs.');
    $('#totalReserva').html(totalReserva + ' Bs.');
    $('#PrecioTotal').html(montoAPagar + ' Bs.');

});
$('#validarCupos').on('click', function () {
    pasajesAdultos = parseInt($('#pasajesadultos').val()) || 0;
    pasajesMayores = parseInt($('#3eraEdad').val()) || 0;
    pasajesNinos = parseInt($('#ninos').val()) || 0;
    pasajes = pasajesAdultos + pasajesMayores + pasajesNinos;
    if (pasajes > 0) {
        $('#ayudaNombres,#ayudaCupos').slideUp('slow');
        $('#SaldosyMontos,#groupcondiciones').slideDown('slow');
        if ($('#condiciones').is(':checked')) {
            $('#botonEnviarForm').slideDown('slow');
        }
    }
    else {

    }
});
$('#condiciones').on('click', function () {

    if ($('#condiciones').is(':checked')) {
        $('#botonEnviarForm').slideDown('slow');
    }
    else {
        $('#botonEnviarForm').slideUp('slow');
    }
})
}
if($('#consultarReserva').length>=1){
    $('#fecha2').datepicker({
        format: "DD, d MM , yyyy",
        autoclose: true,
        clearBtn: true,
        language: 'es',
        altField: "#fecha",
        altFormat: "yy-mm-dd",
        todayBtn:true,
        todayHighlight:true
    }).on('changeDate', function (e) {
        $('#fecha').val((e.format(0, 'yyyy-mm-dd')));

    });
}
$(".btswitch").bootstrapSwitch();
$('[multiple]').select2();

});
function fechasEspecialesx(fechaAComparar) {

    var fechas = window.fechasEspeciales;
    var Mes = fechaAComparar.getMonth();
    var Dia = fechaAComparar.getDate();
    var Ano = fechaAComparar.getFullYear();
    var $respuesta;
    for (i = 0; i < fechas.length; i++) {
        fi = new Date(window.fechasEspeciales[i].fecha.date);
        if (Dia === fi.getDate() && (Mes === fi.getMonth() && Ano === fi.getFullYear())) {
            for (var property in window.fechasEspeciales[i].Embarcaciones) {
                if (window.fechasEspeciales[i].Embarcaciones[property] == 1) {
                    $respuesta = {
                        enabled: true,
                        classes: window.fechasEspeciales[i].clase,
                        tooltip: window.fechasEspeciales[i].descripcion
                    };
                    return $respuesta;
                }
            }
            $respuesta = {
                enabled: false,
                classes: window.fechasEspeciales[i].clase,
                tooltip: window.fechasEspeciales[i].descripcion
            };
            return $respuesta;
        }

    }
}
var datos;
var dd=function(log){console.log(log)};
(function () {
    //swal("Here's a message!");
})();
$(document).ready(function () {
    $(document).ready(function() {
        $('select').material_select();
    });
    $(window).keydown(function (event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
    $.ajaxSetup({
        headers: {
            'X-XSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var mesesCompletos = {
            es: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            en: ['Enero', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            ptBR: ['Enero', 'Fevereiro', 'Março', 'April', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'November', 'Dezembro'],
        },
        mesesCortos = {
            es: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            en: ['Ene', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            ptBR: ['Ene', 'Fev', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        },
        diasDeSemanaCompletos = {
            es: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            en: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
            ptBR: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
        },
        diasDeSemanaCortos = {
            es: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
            en: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            ptBR: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
        },
        diasDeSemanaLetras = {
            es: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
            en: ['S', 'M', 'T', 'W', 'T', 'F', 'S'],
            ptBR: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
        },
        hoy = {
            es: 'Hoy',
            en: 'Today',
            ptBR: 'Hoje',
        },
        SiguienteMes = {
            es: 'Siguiente Mes',
            en: 'Next month',
            ptBR: 'próximo mês',
        },
        MesAnterior = {
            es: 'Mes Anterior',
            en: 'Previous month',
            ptBR: 'mês anterior',
        },
        SeleccioneMes = {
            es: 'Seleccione un mes',
            en: 'Select a month',
            ptBR: 'Selecione um mês',
        },
        SeleccioneAno = {
            es: 'Seleccione un año',
            en: 'Select a year',
            ptBR: 'Escolher um ano',
        },
        clearEtiqueta = {
            es: 'Borar',
            en: 'Clear',
            ptBR: 'Limpar',
        },
        closeEtiqueta = {
            es: 'Cerrar',
            en: 'Close',
            ptBR: 'Fechar',
        },
        primerDia = {
            es: 1,
            en: 1,
            ptBR: 0,
        }
    localization = (typeof(localization) != "undefined") ? localization.replace("-", "") : 'es';
    if (typeof(diasNoLaborables) != "undefined") {
        dias = Object.keys(diasNoLaborables).map(function (k) {
            if (Array.isArray(diasNoLaborables[k])) {
                if (diasNoLaborables[k].length == 3) {
                    return new Date(diasNoLaborables[k][0], diasNoLaborables[k][1] - 1, diasNoLaborables[k][2]);
                }
                else {
                    return [diasNoLaborables[k][0], diasNoLaborables[k][1] - 1, diasNoLaborables[k][2], diasNoLaborables[k][3]];
                }
            }
            return diasNoLaborables[k]
        });
    }
    else {
        dias = null;
    }
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 1,
        monthsFull: mesesCompletos[localization],
        monthsShort: mesesCortos[localization],
        weekdaysFull: diasDeSemanaCompletos[localization],
        weekdaysShort: diasDeSemanaCortos[localization],
        weekdaysLetter: diasDeSemanaLetras[localization],
        today: hoy[localization],
        labelMonthNext: SiguienteMes[localization],
        labelMonthPrev: MesAnterior[localization],
        labelMonthSelect: SeleccioneMes[localization],
        labelYearSelect: SeleccioneAno[localization],
        clear: clearEtiqueta[localization],
        close: closeEtiqueta[localization],
        firstDay: primerDia[localization],
        format: 'd mmmm, yyyy',
        formatSubmit: 'yyyy-mm-dd',
        min: new Date(),
        disable: dias,
        closeOnSelect: true,
        closeOnClear: true,
        onSet: function () {
            var that = this;
            var valor = this.get('select', 'yyyy-mm-dd');
            $('input[name="fecha"]').val(valor);
            $('#LoadingEmbarcacionesYPaseos').slideDown();

            swal({
                    title: "Confirmar Datos",
                    text: "Desea realizar el Paseo el dia " + $('#fechaPaseo').val(),
                    type: "info",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                },
                function () {
                    $.get('/ObtenerVariables/' + valor)
                        .done(function (data) {
                            //console.log(data.embarcaciones.length);
                            for (i = 0; i < data.embarcaciones.length; i++) {
                                var id = data.embarcaciones[i].id;
                                $('.embarcaciones[data-idembarcacion="'+id+'"').removeClass('disabled');
                            }

                            swal.close();
                            that.close();
                            $('#LoadingEmbarcacionesYPaseos').slideUp();
                            $('#Embarcaciones').slideDown();
                            datos=data;
                            //console.log(data);

                            return true;
                        });
                });

        },
        onStart: function () {
            $('.loading,.alert.alert-success').slideUp('slow');
        },
        onClose: function (context) {

        }
    });
    $('.embarcaciones').click(function () {
        $('#CuposDisponibles').slideUp();
        $('.paseos').removeClass('accent-4').addClass('lighten-1');
        $('#paseo_id').val("");
        var $this = $(this);
        if ($this.hasClass('disabled')) {
            swal("Error Embarcacion", "Embarcacion No Valida", "error");
            return false;
        }

        $('.embarcaciones').removeClass('accent-4').addClass('lighten-1');
        $this.removeClass('lighten-1').addClass('accent-4');
        $('#embarcacion_id').val($this.data('idembarcacion'));
        selectedId=$this.data('idembarcacion');
        paseosDeEmbarcacionSeleccionada=datos.paseos[selectedId]
        $('.paseos').addClass('disabled')
        for (i = 0; i < paseosDeEmbarcacionSeleccionada.length; i++) {
            var id = paseosDeEmbarcacionSeleccionada[i].id;
            $('.paseos[data-idPaseo="'+id+'"').removeClass('disabled');
            $('.paseos[data-idPaseo="'+id+'"').children('.cupos')
        }

        $('#Paseos').slideDown();
    });
    $('.paseos').click(function () {
        $('#CuposDisponibles').slideUp();
        var $this = $(this);
        if ($this.hasClass('disabled')) {
            swal("Error Paseo", "Paseo No Valido", "error");
            return false;
        }
        $('.paseos').removeClass('accent-4').addClass('lighten-1');
        $this.removeClass('lighten-1').addClass('accent-4');
        $('#paseo_id').val($this.data('idpaseo'));
        var precios=datos.precios[$this.data('idpaseo')][0];
        var CuposUsados=datos['CuposUtilizados'][$('#embarcacion_id').val()][$this.data('idpaseo')],
            CuposDisponibles;
        CapacidadEmbarcar = (datos['esAdministrador']==true) ? datos['embarcaciones'][$('#embarcacion_id').val()-1]['abordajeMaximo'] : datos['embarcaciones'][$('#embarcacion_id').val()-1]['abordajeNormal'];

        CuposDisponibles=CapacidadEmbarcar-CuposUsados;
        CuposDisponibles=(CuposDisponibles<0)?0:CuposDisponibles;
        $('span.cupos').text(CuposDisponibles);
        $('#precioAdultos').text(precios.adulto);
        $('#precioMayores').text(precios.mayor);
        $('#precioNinos').text(precios.nino);
        $('#datosdePrecios,#CuposDisponibles,#cedulaForm').slideDown();
    });
    $('#validarId').click(function(){
        $('#identificacion').val($('#rifInicio').val()+"-"+$('#identification').val());
        var valor=$('#identificacion').val();
        swal({
                title: "Confirmar Datos de Cliente",
                text: "Su Identificacion Es: " + valor,
                type: "info",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            },
            function () {
                var valor=$('#identificacion').val();
                $.get('/ObtenerDatosClientes/' + valor)
                    .done(function (data) {

                        swal.close();
                        console.log(data);
                    });
            });
        console.log('validando');
    });
});
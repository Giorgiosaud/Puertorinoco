<script>
$(document).ready(function(){
	$('#fecha2').datepicker({
		format: "DD, d MM , yyyy",
		autoclose: true,
		clearBtn: true,
		language: 'es',
		startDate: new Date(new Date().setDate((new Date()).getDate() + parseInt(window.minimoDiasAReservar))),
		altField: "#fecha",
		altFormat: "yy-mm-dd",
	}).on('changeDate', function (e) {
		$('#fecha').val((e.format(0, 'yyyy-mm-dd')));
	});
	$('#fecha2').datepicker('update', new Date($('#fecha').val()));
	$('#fechaPago').datepicker();
	$('select').select2();


});

$('body').on('click', '#modificarUsuario', function(event) {
	event.preventDefault();
	/* Act on the event */
	boton=$(this);

	boton.html('<span class="cargandoFormulario glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>');
	$.ajax({
		url: 'modificarCliente',
		type: 'POST',
		dataType: 'json',
		data: $('#datosDecliente').serialize()
	})
			.done(function(informacion) {
				boton.html('Info Modificada');
				console.log(informacion);
			})
			.fail(function() {
				boton.html('Falló Modificacion');
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});

});
$('body').on('click', '#modificarReserva', function(event) {
	event.preventDefault();
	/* Act on the event */
	boton=$(this);
	var sum = 0;

	$('.pasajes').each(function()
	{
		sum += parseFloat($(this).val());
	});
	ocupados=parseInt($('#cuposdisp').html())-sum;
	var confirmar=true;
	if(ocupados<0){
		confirmar=confirm("¿ Realmente desea relizar este cambio? quedarian "+ocupados+" puestos");
	}
	if(confirmar) {
		boton.html('<span class="cargandoFormulario glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>');

		$.ajax({
			url: 'modificarPaseo',
			type: 'POST',
			dataType: 'json',
			data: $('#modificarPaseo').serialize()
		})
				.done(function (informacion) {
					boton.html('Info Modificada');
					console.log(informacion);
				})
				.fail(function () {
					boton.html('Falló Modificacion');
					console.log("error");
				})
				.always(function () {
					console.log("complete");
				});
	}

});
$('#modificarPaseo').on('reset', function(e)
{
	$('#fecha2').datepicker('update', new Date($('#fecha').val()));
});
$('body').on('click', '#anadirPago', function(event) {
	event.preventDefault();
	/* Act on the event */
	$.ajax({
		url: 'pagar',
		type: 'POST',
		dataType: 'json',
		data: $('#formularioDePago').serialize()

	})
	.done(function(informacion) {
//				location.reload();
				console.log(informacion);
				$("#Pagos > tbody").append("<tr><td>"+informacion.created_at+"</td>"+"<td>"+ $
				('select[name=tipo_de_pago_id] option:selected').text()+"</td><td>"+$('input[name=descripcion]').val
				()+"</td><td><span class='montoPago'>"+informacion.monto+"</span></td></td><td>recarga la pagina para" +
				" " +
				"borrar</tr>");
				var sum = 0;
				$('.montoPago').each(function()
				{
					sum += parseFloat($(this).text());
				});
				$('#montoPagado').text(sum);
				$('#montoDeuda').text(informacion.reserva.deudaRestante);
//
			})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});

});
//$('body').on('click', '.borrarPago', function(event) {
//	event.preventDefault();
//
//	linea=$(this).closest('tr');
//		datos=$(this).serialize();
//		var url = "borrarPago";
//		$.ajax({
//			type: "POST",
//			url: url,
//			dataType: 'json',
//			data: datos,
//			success: function(data)
//			{
////				location.reload();
//				console.log(data);
//				// linea.slideUp('slow');
////				var sum = 0;
////				$('.montoPago').each(function()
////				{
////					sum += parseFloat($(this).text());
////				});
//				// $('#montoPagado').html(sum);
//				// deuda=parseFloat($('#montoTotal').html())-parseFloat(sum);
//				// $('#montoDeuda').html(deuda);
//				}
//			});
//	});
</script>
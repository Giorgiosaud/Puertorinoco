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
	});
</script>
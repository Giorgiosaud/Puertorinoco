<div class="row">
	<h3 class="col-xs-12 text-center">
		{!!Lang::get('reservacion.DatosEn')!!} {!! $reservacion->embarcacion->nombre!!}
	</h3>
	<table class="table table-condensed table-hover">
		@include('reservacion.assets.reservacion.datosPersonales')
		@include('reservacion.assets.reservacion.datosCupos')
		@include('reservacion.assets.reservacion.opcionesDePago')

	</table>
</div>
<script type="text/javascript">
	(function () {
		function $MPBR_load() {
			window.$MPBR_loaded !== true && (function () {
				var s = document.createElement("script");
				s.type = "text/javascript";
				s.async = true;
				s.src = ("https:" == document.location.protocol ? "https://www.mercadopago.com/org-img/jsapi/mptools/buttons/" : "http://mp-tools.mlstatic.com/buttons/") + "render.js";
				var x = document.getElementsByTagName('script')[0];
				x.parentNode.insertBefore(s, x);
				window.$MPBR_loaded = true;
			})();
		}

		window.$MPBR_loaded !== true ? (window.attachEvent ? window.attachEvent('onload', $MPBR_load) : window.addEventListener('load', $MPBR_load, false)) : null;
	})();
</script>
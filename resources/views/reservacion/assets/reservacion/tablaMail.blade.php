<div class="row">
	<h3 class="col-xs-12 text-center">
		{!!Lang::get('reservacion.DatosEn')!!} {!! $reservacion->embarcacion->nombre!!}
	</h3>
	<table class="table table-condensed table-hover">
		@include('reservacion.assets.reservacion.Datos.PersonalesMail')
	</table>

</div>

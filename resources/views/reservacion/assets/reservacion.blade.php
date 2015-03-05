<div class="container">
	<div class="TitulodeReservacion text-center col-xs-12">
		<h1>
			{!!Lang::get('reservacion.Graciasporsureservaciónnumero')!!} <strong>{{ $reservacion->id }}</strong>
		</h1>
	</div>
	@include('reservacion.assets.reservacion.tabla')
</div>

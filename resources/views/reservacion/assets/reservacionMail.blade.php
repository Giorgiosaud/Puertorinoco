<div class="container">
	<div class="TitulodeReservacion text-center col-xs-12">
		<h1>
			{!!Lang::trans('reservacion.Graciasporsureservaciónnumero',['reservacion'=>$reservacion->id])!!}
		</h1>
	</div>
	@include('reservacion.assets.reservacion.tablaMail')
</div>

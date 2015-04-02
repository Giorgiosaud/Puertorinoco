<tr id="opcionesDePago">
	@if($reservacion->deuda>0)
		<td colspan="3" id="pagoOnline">
			<table class="table">
				@include('reservacion.assets.reservacion.Pagos.Tipos.Online')
			</table>
		</td>
		<td colspan="3" id="tablapagoOficina">
			<table class="table" id="pagoOficina">
				@include('reservacion.assets.reservacion.Pagos.Tipos.Oficina')

			</table>
		</td>
		@include('reservacion.assets.reservacion.Datos.Resto')

	@else
		<td colspan="6" id="Pagada">
			<div class="alert alert-success" role="alert">Esta Reserva Ya Fue Pagada Completamente</div>
		</td>
	@endif
</tr>
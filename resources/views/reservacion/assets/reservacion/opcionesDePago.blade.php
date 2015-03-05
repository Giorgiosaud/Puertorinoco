<tr id="opcionesDePago">

	@if($totalCuposEnPaseo>=$reservacion->embarcacion->abordajeMinimo)
		<td colspan="2" id="pagoOnline">
			<table class="table">
				<tr class="success">
					<th colspan="2">
						<strong>Pagar Directamente desde Esta Pagina.</strong>
					</th>
				</tr>
				<tr>
					<td>
						<strong>Monto Sin IVA: Bs. </strong>
					</td>
					<td>
						{{ $reservacion->montoSinIva}}
					</td>
				<tr>
					<td>
						<strong>IVA: Bs. </strong>
					</td>
					<td>
						{{ $reservacion->montoIVA }}
					</td>
				</tr>
				{{--@if($creditoUsado>0)--}}
				{{--<tr>--}}
				{{--<td>--}}
				{{--<strong>Giftcard: Bs. </strong>--}}
				{{--</td>--}}
				{{--<td>--}}
				{{--							{{ number_format($creditoUsado, 2, ',', '.')." Bs." }}--}}
				{{--</td>--}}
				{{--</tr>--}}

				{{--<tr>--}}
				{{--<td>--}}
				{{--<strong>--}}
				{{--Saldo Final Cliente: Bs.--}}
				{{--</strong>--}}
				{{--</td>--}}
				{{--<td>--}}
				{{--							{{ number_format($reservacion->client->credit, 2, ',', '.')." Bs." }}--}}
				{{--</td>--}}
				{{--</tr>--}}
				{{--@endif--}}
				<tr>
					<td>
						<strong>Sub Total: Bs. </strong>
					</td>
					<td>
						{{ $reservacion->montoTotalAPagar }}
					</td>
				</tr>
				<tr>
					<td>
						<strong>Servicio: Bs. </strong>
					</td>
					<td>
						{{ $reservacion->montoServicio}}
					</td>
				</tr>
				<tr>
					<td>
						<strong>Total: Bs. </strong>
					</td>
					<td>
						{{ $reservacion->montoConServicio}}
					</td>
				</tr>
				{{--				@if($reservacion->montoConServicioEscrito>0)--}}
				{{--<tr class="hidden-print">--}}
				{{--<td colspan="2" class="text-center">--}}
				{{--<a href="{{ $linkmp }}" name="MP-Checkout" class="lightblue-ar-s-ov" mp-mode="modal"--}}
				{{--onreturn="execute_my_onreturn">Pagar</a>--}}
				{{--</a>--}}
				{{--</td>--}}
				{{--</tr>--}}
				@endif
				</tr>
				</table>
				{{--</td>--}}
				{{--@else--}}
				{{--<td colspan="2" id="sinPagoOnline">--}}
				{{--<table class="table" id="pagoOnlineNo">--}}
				{{--<tr class="success">--}}
				{{--<th colspan="2">--}}
				{{--<strong>--}}
				{{--Pago Online.--}}
				{{--</strong>--}}
				{{--</th>--}}
				{{--</tr>--}}
				{{--<tr class="warning">--}}
				{{--<td id="noMp" class="alert alert-warning">--}}
				{{--Debido a la <strong>cantidad de pasajeros que tenemos en este Zarpe hasta el--}}
				{{--momento</strong> no puede realizar el pago en la pagina. Por favor contactenos para--}}
				{{--realizar el pago por transferencia ya que la cantidad minima para zarpar--}}
				{{--en {{ $reservacion->embarcacion->nombre}} es de {{ $reservacion->embarcacion->abordajeMinimo }}--}}
				{{--personas.--}}
				{{--</td>--}}
				{{--</tr>--}}
				{{--</table>--}}
				{{--</td>--}}
				{{--@endif--}}
				{{--<td colspan="4" id="tablapagoOficina">--}}
				{{--<table class="table" id="pagoOficina">--}}
				{{--<tr class="success">--}}
				{{--<th colspan="2">--}}
				{{--<strong>--}}
				{{--Pagar En Nuestras Oficinas o Realice Transferencia.--}}
				{{--</strong>--}}
				{{--</th>--}}
				{{--</tr>--}}
				{{--<tr>--}}
				{{--<td>--}}
				{{--<strong>--}}
				{{--Monto Sin IVA: Bs.--}}
				{{--</strong>--}}
				{{--</td>--}}
				{{--<td>--}}
				{{--{{ $reservacion->montoTotal}}--}}
				{{--</td>--}}
				{{--</tr>--}}
				{{--<tr>--}}
				{{--<td>--}}
				{{--<strong>--}}
				{{--IVA: Bs.--}}
				{{--</strong>--}}
				{{--</td>--}}
				{{--<td>--}}
				{{--{{ $reservacion->montoIva}}--}}
				{{--</td>--}}
				{{--</tr>--}}
				{{--@if($creditoUsado>0)--}}
				{{--<tr>--}}
				{{--<td>--}}
				{{--<strong>Giftcard: Bs. </strong>--}}
				{{--</td>--}}
				{{--<td>--}}
				{{--						{{ number_format($creditoUsado, 2, ',', '.')." Bs." }}--}}
				{{--</td>--}}
				{{--</tr>--}}

				{{--<tr>--}}
				{{--<td>--}}
				{{--<strong>--}}
				{{--Saldo Final Cliente: Bs.--}}
				{{--</strong>--}}
				{{--</td>--}}
				{{--<td>--}}
				{{--						{{ number_format($reservacion->client->credit, 2, ',', '.')." Bs." }}--}}
				{{--</td>--}}
				{{--</tr>--}}
				{{--@endif--}}
				{{--<tr>--}}
				{{--<td>--}}
				{{--<strong>--}}
				{{--Total: Bs.--}}
				{{--</strong>--}}
				{{--</td>--}}
				{{--<td>--}}
				{{--{{ $reservacion->montoTotalAPagar}}--}}
				{{--</td>--}}
				{{--</tr>--}}
				{{--<tr>--}}
				{{--<td>--}}
				{{--<strong>--}}
				{{--Cuenta Corriente:--}}
				{{--</strong>--}}
				{{--</td>--}}
				{{--<td>--}}
				{{--Banesco: 0134-0348-18-3481078323--}}
				{{--</td>--}}
				{{--</tr>--}}
				{{--<tr>--}}
				{{--<td>--}}
				{{--<strong>--}}
				{{--A nombre de:--}}
				{{--</strong>--}}
				{{--</td>--}}
				{{--<td>--}}
				{{--<strong>--}}
				{{--Puertorinoco Catamaran,c.a.--}}
				{{--</strong>--}}
				{{--</td>--}}
				{{--</tr>--}}
				{{--<tr>--}}
				{{--<td>--}}
				{{--<strong>--}}
				{{--R.I.F.--}}
				{{--</strong>--}}
				{{--</td>--}}
				{{--<td>--}}
				{{--J-29704016-1--}}
				{{--</td>--}}
				{{--</tr>--}}
				{{--</table>--}}
				{{--</td>--}}
				</tr>

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
		</tr>
		<tr>
			<td>
				<strong>IVA: Bs. </strong>
			</td>
			<td>
				{{ $reservacion->montoIVA }}
			</td>
		</tr>
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
				<strong>Monto Pagado: Bs. </strong>
			</td>
			<td>
				{{ number_format($reservacion->montoPagado, 2, ',', '.')." Bs." }}
			</td>
		</tr>
		<tr>
			<td>
				<strong>
					Saldo a Pagar de Reserva Actual:
				</strong>
			</td>
			<td>
				{{ number_format($reservacion->deudaRestante, 2, ',', '.')." Bs." }}
			</td>
		</tr>

		<tr>
			<td>
				<strong>10% Servicio Web: Bs. </strong>
			</td>
			<td>
				{{ $reservacion->montoServicio}}
			</td>
		</tr>
		<tr>
			<td>
				<strong>Total A Pagar Via Web: Bs. </strong>
			</td>
			<td>
				{{ $reservacion->montoConServicio}}
			</td>
		</tr>
		<tr>
			<td class="text-center" colspan="2">
				@include('reservacion.assets.reservacion.MercadoPago.pagoMP')

			</td>
		</tr>
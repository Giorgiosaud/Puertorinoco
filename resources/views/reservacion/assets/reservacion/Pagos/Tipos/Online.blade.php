
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
		<tr>
			<td>
				<strong>Credito Usado: Bs. </strong>
			</td>
			<td>
				{{ number_format($reservacion->pagos()->sum('monto'), 2, ',', '.')." Bs." }}
			</td>
		</tr>
		<tr>
			<td>
				<strong>
					Saldo A Favor Pendiente Cliente: Bs.
				</strong>
			</td>
			<td>
				{{ number_format($reservacion->cliente->credito, 2, ',', '.')." Bs." }}
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
		<tr>
			<td class="text-center" colspan="2">
				@include('reservacion.assets.reservacion.MercadoPago.pagoMP')

			</td>
		</tr>
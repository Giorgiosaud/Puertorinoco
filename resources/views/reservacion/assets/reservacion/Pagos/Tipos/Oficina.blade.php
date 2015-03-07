<tr class="success">
	<th colspan="2">
		<strong>
			Pagar En Nuestras Oficinas o Realice Transferencia.
		</strong>
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
		<strong>Total A Pagar En Oficina: Bs. </strong>
	</td>
	<td>
		{{ $reservacion->montoTotalAPagar }}
	</td>
</tr>
<tr>
<tr>
	<td>
		<strong>
			Cuenta Corriente:
		</strong>
	</td>
	<td>
		Banesco: 0134-0348-18-3481078323
	</td>
</tr>
<tr>
	<td>
		<strong>
			A nombre de:
		</strong>
	</td>
	<td>
		<strong>
			Puertorinoco Catamaran,c.a.
		</strong>
	</td>
</tr>
<tr>
	<td>
		<strong>
			R.I.F.
		</strong>
	</td>
	<td>
		J-29704016-1
	</td>
</tr>
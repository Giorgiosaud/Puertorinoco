<tr>
	<td>
		Fecha del Paseo:
	</td>
	<td>
		{{ $reservacion->fecha  }}
	</td>
</tr>
<tr>
	<td>
		Hora del Paseo:
	</td>
	<td>
		{{ $reservacion->paseo->horaDeSalida  }}
	</td>
</tr>
<tr>
	<td>
		Numero de Adultos:
	</td>
	<td class="text-left">
		{{ $reservacion->adultos  }}
	</td>
	<td>
		Numero de Adultos Mayores:
	</td>
	<td class="text-left">
		{{ $reservacion->mayores  }}
	</td>
	<td>
		Numero de ninos:
	</td>
	<td class="text-left">
		{{ $reservacion->ninos  }}
	</td>
</tr>
<th colspan="2" class="text-center">
	{!!Lang::get('reservacion.DatosPersonales')!!}:
</th>
<th colspan="2" class="text-center">
	{!!Lang::get('reservacion.Cupos')!!}:
</th>
<th colspan="2" class="text-center">
	{!!Lang::get('reservacion.QrCode')!!}:
</th>
<tr>
	<td>
		{!!Lang::get('reservacion.Nombre(s)')!!}:
	</td>
	<td>
		{{ $reservacion->cliente->nombre}}
	</td>
	<td class="text-left">
		Fecha del Paseo:
	</td>
	<td class="text-left">
		{!!CarbonLoc::diffForHumans2($reservacion->fecha)!!} ({!!$reservacion->fecha->format('d-m-Y')!!})
	</td>


	<td colspan="2" rowspan="5" class="text-center">
		<a href="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(250)->generate(URL::to
			('/reservas/informacion/') . '/' .$reservacion->id)) }}"
		   download="CofigoQRDeReservacion{{$reservacion->id}}.jpg">
			<img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(250)->generate(URL::current())) }}"/>
		</a>
	</td>






</tr>

<tr>
	<td>
		{!!Lang::get('reservacion.Apellido(s)')!!}:
	</td>
	<td>
		{{ $reservacion->cliente->apellido}}
	</td>
	<td class="text-left">
		Hora del Paseo:
	</td>
	<td class="text-left">
		{{ $reservacion->paseo->horaDeSalida  }}
	</td>
</tr>
<tr>
	<td>
		{!!Lang::get('reservacion.Cedula')!!}:

	</td>
	<td>
		{{ $reservacion->cliente->identificacion }}
	</td>
	<td class="text-left">
		Numero de Adultos:
	</td>
	<td class="text-left">
		{{ $reservacion->adultos  }}
	</td>
</tr>
</tr>
<tr>
	<td>
		{!!Lang::get('reservacion.Email')!!}:

	</td>
	<td>
		{{ $reservacion->cliente->email }}
	</td>
	<td class="text-left">
		Numero de Adultos Mayores:
	</td>
	<td class="text-left">
		{{ $reservacion->mayores  }}
	</td>
</tr>
<tr>
	<td>
		{!!Lang::get('reservacion.Telefono')!!}:
	</td>
	<td>
		{{ $reservacion->cliente->telefono }}
	</td>
	<td class="text-left">
		Numero de ninos:
	</td>
	<td class="text-left">
		{{ $reservacion->ninos  }}
	</td>
</tr>

<tr>
	<td>
		Nombre(s):
	</td>
	<td>
		{{ $reservacion->cliente->nombre}}
	</td>
	<td colspan="4" rowspan="7" class="text-center">
		<?php $url = URL::to('/reservas/informacion/') . '/' . $reservacion->id;?>
		<a href="{{ $url }}">
			<img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(250)->generate($url)) }} ">
		</a>
	</td>
</tr>
<tr>
	<td>
		Apelido(s):
	</td>
	<td>
		{{ $reservacion->cliente->apellido}}
	</td>
</tr>
<tr>
	<td>
		Cedula:
	</td>
	<td>
		{{ $reservacion->cliente->identificacion }}
	</td>
</tr>
<tr>
	<td>
		Email:
	</td>
	<td>
		{{ $reservacion->cliente->email }}
	</td>
</tr>
<tr>
	<td>
		Telefono:
	</td>
	<td>
		{{ $reservacion->cliente->telefono }}
	</td>
</tr>
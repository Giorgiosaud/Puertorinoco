<div class="panel-heading">
	<h2>Datos de Pasajeros</h2>
</div>
<div class="panel-body">
	<div class="table-responsive">
		<table class="table table-bordered table-condensed">
			<tr>
				<th>Nombre(s)</th>
				<th>Apellido(s)</th>
				<th>Identificacion</th>
				<th>Correo</th>
				<th>Telefono</th>
				<th>Accion</th>

			</tr>

			@foreach($reserva->pasajeros as $pasajero)
				<tr>
					<td>{!!$pasajero->nombre!!}</td>
					<td>{!!$pasajero->apellido!!}</td>
					<td>{!!$pasajero->identificacion!!}</td>

					<td>{!!$pasajero->email!!}</td>
					<td>{!!$pasajero->telefono!!}</td>
					<td>
						{!!Form::open(['url'=>route('borrarPasajero'),'class'=>'borrarPasajero'])!!}
						{!!Form::hidden('id',$pasajero->id)!!}
						{!!Form::hidden('reservacion_id',$reserva->id)!!}
						{!!Form::submit('borrar')!!}
						{!!Form::close()!!}
					</td>
				</tr>
			@endforeach
		</table>
	</div>
	<div class="table-responsive">
		<table class="table table-bordered table-condensed">

		<tr>
				<th>Nombre(s)</th>
				<th>Apellido(s)</th>
				<th>Identificacion</th>
				<th>Correo</th>
				<th>Telefono</th>
				<th>Accion</th>

			</tr>
			<tr>

				{!!Form::inline(['id'=>'formularioDePasajeros','url'=>route('anadirPasajeros')])!!}
				{!!Form::hidden('reservacion_id',$reserva->id)!!}
				<td>{!!Form::text('nombre')!!}</td>
				<td>{!!Form::text('apellido')!!}</td>
				<td>{!!Form::text('identificacion')!!}</td>
				<td>{!!Form::text('email')!!}</td>
				<td>{!!Form::text('telefono')!!}</td>
				<td>{!! Button::success('Añadir')->submit()!!}</td>

				{!!Form::close()!!}
			</tr>
		</table>
	</div>
</div>

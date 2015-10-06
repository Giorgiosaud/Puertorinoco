<div class="col s12">
	<div class="card blue-grey darken-1">
		<div class="card-content white-text">
			<span class="card-title">Datos de Pasajeros</span>
			<div class="col s12">
				<table class="bordered highlight responsive-table centered">
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
							{!!Form::open(['url'=>route('borrarPasajero',$reserva->id),'class'=>'borrarPasajero'])!!}
							{!!Form::hidden('id',$pasajero->id)!!}
							{!!Form::hidden('reservacion_id',$reserva->id)!!}
							{!! Button::success('Borrar')->addAttributes(['class'=>'borrarPasajero'])->submit()!!}
							{!!Form::close()!!}
						</td>
					</tr>
					@endforeach
				</table>
			</div>
			<div class="col s12">
				<table class="bordered highlight responsive-table centered">

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
			<div class="clearfix"></div>
		</div>
		<div class="card-action">
			{{-- <a href="#">This is a link</a> --}}
			{{-- <a href="#">This is a link</a> --}}
		</div>
	</div>
</div>


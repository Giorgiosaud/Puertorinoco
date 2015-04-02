@extends('templates.mainInterno')
@section('content')
	@if($reservaciones->count()>0)
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-condensed">
				<tr>
					<th colspan="13"
					    class="info text-center">{{ $fecha=$reservaciones[0]->fecha->format('d-m-Y') }}</th>
				</tr>
				<tr>
					<th colspan="13"
					    class="info text-center">{{ $embarcacion=$reservaciones[0]->embarcacion->nombre }}</th>
				</tr>
				<tr>
					<th colspan="13" class="info text-center">{{ $paseo=$reservaciones[0]->paseo->horaDeSalida}}</th>
				</tr>
				@include('reservacion.admin.partials.headersTabla')

				@foreach($reservaciones as $reservacion)
					@if($embarcacion != $reservacion->embarcacion->nombre)

						<tr>
							<th colspan="13" class="info text-center">{{ $embarcacion=$reservacion->embarcacion->nombre
						}}</th>
						</tr>
						<tr>
							<th colspan="13" class="info text-center">{{ $paseo=$reservacion->paseo->horaDeSalida}}</th>
						</tr>
						@include('reservacion.admin.partials.headersTabla')
					@endif
					@if($paseo != $reservacion->paseo->horaDeSalida)
						{{--<tr>a</tr>--}}
						<tr>
							<th colspan="13" class="info text-center">{{ $paseo=$reservacion->paseo->horaDeSalida}}</th>
						</tr>
						@include('reservacion.admin.partials.headersTabla')

					@endif

					<tr onclick="window.open('{{ URL::route('editarReservas',$reservacion->id,true)}}')">
						<td>{!!$reservacion->id!!}</td>
						<td>{!!$reservacion->cliente->nombre!!}</td>
						<td>{!!$reservacion->cliente->apellido!!}</td>
						<td>{!!$reservacion->cliente->telefono!!}</td>
						<td>{!!$reservacion->adultos!!}</td>
						<td>{!!$reservacion->mayores!!}</td>
						<td>{!!$reservacion->ninos!!}</td>
						<td>{!!$total=$reservacion->ninos+$reservacion->mayores+$reservacion->adultos!!}</td>
						<td>{!!$reservacion->montoTotalAPagar!!}</td>
						<td>{!!$reservacion->montoDeudaRestante!!}</td>
						<td>{!!$reservacion->hechoPor!!}</td>
						<td>{!!$reservacion->modificadoPor!!}</td>
					</tr>

				@endforeach
			</table>
		</div>
	@else
		<h1>No Existen Reservas con los datos suministrados</h1>
	@endif

@endsection

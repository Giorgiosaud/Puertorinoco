<div class="panel-heading">
	<h2>Datos de Pagos</h2>
</div>
<div class="panel-body">
	<div class="table-responsive">
		<table class="table table-bordered table-condensed" id="Pagos">
			<tr>
				<th>Fecha</th>
				<th>Tipo De Pago</th>
				<th>Descripcion</th>
				<th>Monto Pagado</th>
				<th>Accion</th>
			
			</tr>
			
			@foreach($reserva->pagos as $pago)
				<tr>
					<td>{!!$pago->created_at->format('d-m-Y')!!}</td>
					@if($pago->pago_type=='App\PagoDirecto')
						<td>{!!$pago->detalles->tipo->nombre!!}</td>
						<td>{!!$pago->detalles->descripcion!!}</td>
					@else
						<td>Mercadopago</td>
						<td>Pago con {!!$pago->detalles->payment_type!!} y el
							id de pago de Mercadopago es {!!$pago->detalles->idMercadoPago!!}</td>
					@endif
					<td><span class='montoPago'>{!!$pago->MontoPagado!!}</span></td>
					<td>
						@if($pago->pago_type=='App\PagoDirecto' && $pago->detalles->tipo_de_pago_id!=8)
							
							{!!Form::open(['url'=>route('borrarPago',$reserva->id),'class'=>'borrarPago'])!!}
							{!!Form::hidden('id',$pago->id)!!}
							{!!Form::submit('borrar',['class'=>'borrarPago'])!!}
							{!!Form::close()!!}
						@endif
					</td>
				</tr>
			@endforeach
		
		</table>
	</div>
	<div class="table-responsive">
		<table class="table table-bordered table-condensed">
			<tr>
				<th>Fecha</th>
				<th>Tipo De Pago</th>
				<th>Descripcion</th>
				<th>Monto</th>
				<th>Accion</th>
			</tr>
			<tr>
				{!!Form::inline(['id'=>'formularioDePago','url'=>route('recibirPago')])!!}
				{!!Form::hidden('reservacion_id',$reserva->id)!!}
				<td>{!! Form::text('fechaPago',\Carbon\Carbon::now(),['id'=>'fechaPago']) !!}
				<td>{!! Form::select('tipo_de_pago_id',$tiposDePagos) !!}
				</td>
				<td>{!!	Form::text('descripcion') !!}</td>
				<td>{!!	Form::text('monto') !!}{!!	Form::hidden('reservacion_id',$reserva->id) !!}</td>
				<td>{!! Button::success('Añadir')->addAttributes(['id'=>'anadirPago'])->submit()!!}</td>
				{!!Form::close()!!}
			</tr>
		</table>
	</div>
	<div class="panel-footer">
		<div class="table-responsive">
			<table class="table table-bordered table-condensed">
				<tr>
					<th>Monto Total De La Reserva</th>
					<th>Monto Pagado</th>
					<th>Monto Deuda</th>
				</tr>
				<tr>
					<td><span id="montoTotal">{!!$reserva->montoTotalAPagar!!}</span></td>
					<td><span id="montoPagado">{!!$reserva->montoPagado!!}</span></td>
					<td><span id="montoDeuda">{!!$reserva->montoDeudaRestante!!}</span></td>
				</tr>
			</table>
		</div>
	</div>
</div>

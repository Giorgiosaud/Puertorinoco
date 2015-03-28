<tr>
	<td>{!!$pago->created_at->format('d-m-Y')!!}</td>
	<td>{!!$pago->detalles->tipo->nombre!!}</td>
	<td>{!!$pago->detalles->descripcion!!}</td>
	<td><span class='montoPago'>{!!$pago->monto!!}</span></td>
	<td>
		@if($pago->pago_type=='App\PagoDirecto')

			{!!Form::open(['route'=>'borrarPago','class'=>'borrarPago'])!!}
			{!!Form::hidden('id',$pago->id)!!}
			{!!Form::submit('borrar')!!}
			{!!Form::close()!!}
		@endif
	</td>
</tr>
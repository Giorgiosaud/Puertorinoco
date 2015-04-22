<div class="panel-heading BorrarReserva" >
	<h3>Borrar Reserva</h3>

</div>
<div class="panel-body">
	{!! Form::horizontalModel($reserva,['method'=>'delete','url'=>route('borrarReservas',$reserva->id),'id'=>'borrarReservas']) !!}

	{!!Form::hidden('id')!!}

	{!! Button::danger('Eliminar Reserva')->addAttributes(['method'=>'delete','id'=>'modificarReserva'])->block()->submit()!!}
	{!! Form::close() !!}
</div>
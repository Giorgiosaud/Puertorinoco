<div class="panel-heading">
	<h3>Datos del Paseo <span class="badge">Cupos Disponibles En Paseo sin esta reserva: <span id="cuposdisp">
			{!!$cuposDisponibles!!}</span></span></h3>
</div>
<div class="panel-body">
	{!! Form::horizontalModel($reserva,['route'=>'modificarPaseo','id'=>'modificarPaseo']) !!}
	{!!Form::hidden('disponibles',$cuposDisponibles)!!}
	{!!Form::hidden('id')!!}
	{!!Form::hidden('modificadoPor',Auth::user()->nombre)!!}
	{!!Form::hidden('fecha',null,['id'=>'fecha'])!!}
	{!!
			ControlGroup::generate(
			Form::label('fecha2', 'Fecha: '),
			Form::text('fecha2'),
			null,
			4,
			8
			)->withAttributes(['class'=>'col-xs-12 col-md-4'])
	!!}

	{!!
	ControlGroup::generate(
	Form::label('embarcacion_id', 'Embarcacion: '),
	Form::select('embarcacion_id',$embarcaciones,null,['class'=>'form-control']),
	null,
	4,
	8
	)->withAttributes(['class'=>'col-xs-12 col-md-4'])
	!!}
	{!!
	ControlGroup::generate(
	Form::label('paseo_id', 'Hora: '),
	Form::select('paseo_id',$paseos,null,['class'=>'form-control']),
	null,
	4,
	8
	)->withAttributes(['class'=>'col-xs-12 col-md-4'])
	!!}
	<div class="clearfix"></div>
	{!!
			ControlGroup::generate(
			Form::label('adultos', 'Adultos: '),
			Form::number('adultos',null,['class'=>'pasajes']),
			null,
			4,
			8
			)->withAttributes(['class'=>'col-xs-12 col-md-4'])
	!!}
	{!!
	ControlGroup::generate(
	Form::label('mayores', 'Mayores: '),
	Form::number('mayores',null,['class'=>'pasajes']),
	null,
	4,
	8
	)->withAttributes(['class'=>'col-xs-12 col-md-4'])
	!!}
	{!!
	ControlGroup::generate(
	Form::label('ninos', 'Niños: '),
	Form::number('ninos',null,['class'=>'pasajes']),
	null,
	4,
	8
	)->withAttributes(['class'=>'col-xs-12 col-md-4'])
	!!}
	<div class="clearfix"></div>
	<div class="center-block text-center">
		{!!Form::Reset('Borrar Cambios',['class'=>'btn btn-warning'])!!}
		{!! Button::success('Modificar Info')->addAttributes(['id'=>'modificarReserva'])->submit()!!}

	</div>
	{!!Form::close()!!}
</div>

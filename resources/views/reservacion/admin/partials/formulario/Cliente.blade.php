<div class="panel-heading"><h3>Datos del Cliente <span class="badge">Id Cliente:
			{!!$reserva->cliente->id!!}</span></h3>
</div>
<div class="panel-body">
	{!! Form::horizontalModel($reserva->cliente,['id'=>'datosDecliente']) !!}
	{!! Form::hidden('id')!!}
	{!!
					ControlGroup::generate(
					Form::label('nombre', 'Nombre: '),
					Form::text('nombre'),
					null,
					4,
					8
					)->withAttributes(['class'=>'col-xs-12 col-md-4'])
			!!}
	{!!
			ControlGroup::generate(
			Form::label('apellido', 'Apellido: '),
			Form::text('apellido'),
			null,
			4,
			8
			)->withAttributes(['class'=>'col-xs-12 col-md-4'])

	!!}
	{!!
			ControlGroup::generate(
			Form::label('identificacion', 'Identificacion: '),
			Form::text('identificacion'),
			null,
			4,
			8
			)->withAttributes(['class'=>'col-xs-12 col-md-4'])

	!!}
	{!!
			ControlGroup::generate(
			Form::label('email', 'Email: '),
			Form::text('email'),
			null,
			4,
			8
			)->withAttributes(['class'=>'col-xs-12 col-md-4'])

	!!}
	{!!
			ControlGroup::generate(
			Form::label('telefono', 'Telefono: '),
			Form::text('telefono'),
			null,
			4,
			8
			)->withAttributes(['class'=>'col-xs-12 col-md-4'])

	!!}
	<div class="text-center">
		{!!Form::Reset('Borrar Cambios',['class'=>'btn btn-danger'])!!}

		{!! Button::success('Modificar Info')->addAttributes(['id'=>'modificarUsuario'])!!}
	</div>
	{!! Form::close() !!}

</div>

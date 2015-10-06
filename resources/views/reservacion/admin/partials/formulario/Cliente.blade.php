<div class="col s12 m6">
	<div class="card blue-grey darken-4">
		<div class="card-content white-text">
			<span class="card-title">
				Datos del Cliente
			</span>
			{!! Form::horizontalModel($reserva->cliente,['id'=>'datosDecliente','route'=>'modificarCliente']) !!}
			{!! Form::hidden('id')!!}
			{!! Form::hidden('reservacion_id',$reserva->id)!!}
			<div class="col s12">
				{!!	Form::label('nombre', 'Nombre: ')!!}
				{!! Form::text('nombre')!!}
			</div>
			<div class="col s12">
				{!!	Form::label('apellido', 'Apellido: ')!!}
				{!!	Form::text('apellido')	!!}
			</div>
			<div class="col s12">
				{!! Form::label('identificacion', 'Identificacion: ')!!}
				{!!Form::text('identificacion')!!}
			</div>
			<div class="col s12">
				{!! Form::label('email', 'Email: ')!!}
				{!!Form::text('email')!!}
			</div>
			<div class="col s12">
				{!! Form::label('telefono', 'Telefono: ')!!}
				{!! Form::text('telefono')!!}
			</div>
			<div class="col s12">
				{!! Form::label('credito', 'Credito: ')!!}
				{!!	Form::text('credito') !!}
			</div>

		</div>
		<div class="clearfix"></div>
		<div class="card-action">
			<div class="center-align">
				{!! Form::Reset('Borrar Cambios',['class'=>'waves-effect waves-light btn'])!!}

				{!! Button::success('Modificar Info')->addAttributes(['id'=>'modificarUsuario'])->submit()!!}
				{!! Form::close()!!}
			</div>
		</div>
	</div>




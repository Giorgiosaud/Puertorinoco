<div class="row" id="datosPersonales">
	<div class="row" id="cedulaForm">
		<div class="col s3">
			{!!Form::select('rifInicio',array('V'=>'V','E'=>'E','J'=>'J','G'=>'G','E'=>'E','P'=>'Pasaporte'),null,[
			'class'=>''
			])!!}
			{!! Form::label('rifInicio', 'Cedula: ', array('class' => 'col s3 control-label')) !!}
		</div>
		<div class="col s5">
			{!! Form::text('identificacion_number',Input::old('identificacion_number'),[
				'id'=>"identification",
				'placeholder'=>'Numero de Cedula',
				'class'=>'form-control tienepopover',
				'data-container'=>'body',
				'data-toggle'=>'popover',
				'data-placement'=>'right',
				'data-content'=>'Ingrese solo su número de cedula o rif Válido',
				'data-original-title'=>"Introduzca Su Cedula"]
				) !!}



		</div>
		<div class="col s1">
			<button class="btn btn-success" id="validarId" type="button">
				<span class="glyphicon glyphicon-ok"></span>
			</button>
		</div>
		{!!Form::hidden('identificacion')!!}
		<div class="clearfix"></div>
		@if ($errors->has('identificacion')) <p class="help-block bg-danger text-center">{!! $errors->first
		('identificacion') !!}</p>@endif
	</div>
	<div class="form-group datosInternosCliente" id="nombresForm">
		<div class="alert alert-success col s11" id="ayudaNombres" role="alert">Verifique o Ingrese Sus Datos
			Personales</div>
		{!! Form::label('name', 'Nombres: ', ['class' => 'col s3 control-label']) !!}

		<div class="col s8">
			{!! Form::text('nombre',Input::old('nombre'),[
				'id'=>"nombre",
				'placeholder'=>'Ingrese Su(s) Nombre(s)',
				'class'=>'form-control tienepopover inputDatosPersonales',
				'data-container'=>'body',
				'data-toggle'=>'popover',
				'data-placement'=>'right',
				'data-content'=>'Ingrese Su Nombre'
				]
				) !!}

		</div>

		<div class="clearfix"></div>
		@if ($errors->has('nombre')) <p class="help-block bg-danger text-center">{!!$errors->first('nombre') !!}</p> @endif
	</div>
	<div class="form-group datosInternosCliente" id="apellidosForm">

		{!! Form::label('apellido', 'Apellidos: ', array('class' => 'col s3 control-label')) !!}
		<div class="col s8">
			{!! Form::text('apellido',Input::old('Apellido'),array(
				'id'=>"apellido",
				'placeholder'=>'Ingrese Su(s) Apellido(s)',
				'class'=>'form-control tienepopover inputDatosPersonales',
				'data-container'=>'body',
				'data-toggle'=>'popover',
				'data-placement'=>'right',
				'data-content'=>'Ingrese Su Apellido',
															// 'disabled'=>true
				)) !!}
		</div>
		<div class="clearfix"></div>
		@if ($errors->has('apellido')) <p class="help-block bg-danger text-center">{!! $errors->first('apellido') !!}</p> @endif
	</div>
	<div class="form-group datosInternosCliente" id="emailForm">

		{!! Form::label('email', 'Email: ', array('class' => 'col s3 control-label')) !!}
		<div class="col s8">
			{!! Form::text('email',Input::old('email'),array(
				'id'=>"email",
				'placeholder'=>'Ingrese Su correo electronico',
				'class'=>'form-control tienepopover inputDatosPersonales',
				'data-container'=>'body',
				'data-toggle'=>'popover',
				'data-placement'=>'right',
				'data-content'=>'Ingrese un correo electronico Válido',
																	  // 'disabled'=>true
				)) !!}

		</div>
		<div class="clearfix"></div>
	@if ($errors->has('email')) <p class="help-block bg-danger text-center">{!!$errors->first('email') !!}</p> @endif
	</div>
	<div class="form-group datosInternosCliente" id="telefonoForm">

		{!! Form::label('phone', 'Telefono: ', array('class' => 'col s3 control-label')) !!}
		<div class="col s8">
			{!! Form::text('telefono',Input::old('telefono'),array(
				'id'=>"telefono",
				'placeholder'=>'Ingrese Su correo Telefono',
				'class'=>'form-control tienepopover inputDatosPersonales',
				'data-container'=>'body',
				'data-toggle'=>'popover',
				'data-placement'=>'right',
				'data-content'=>'Ingrese un número de telefono Válido (Solo Numero Ej:02869233147)',
																				// 'disabled'=>true
				)) !!}
		</div>
		<div class="clearfix"></div>
	@if ($errors->has('telefono')) <p class="help-block bg-danger text-center">{!! $errors->first('telefono') !!}</p> @endif
	</div>
</div>

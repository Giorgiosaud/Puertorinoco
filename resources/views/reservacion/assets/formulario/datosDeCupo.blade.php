<div class="form-group" id="datosdeCupos">
	<div class="alert alert-success col-xs-11" id="ayudaCupos" role="alert">Ingrese la cantidad de personas</div>
	<div class="form-group" id="cupos">
		{!! Form::label('cuposReservados', 'Numero de Personas: ', array('class' => 'col-xs-3 control-label')) !!}
		<div id="cuposReservados" class="col-xs-7">
			<div class="col-xs-4">
				{!! Form::label('pasajesadultos', 'Adultos: ', array('class' => 'control-label')) !!}

				{!! Form::input('number','adultos',Input::old('adultos',0),array(
					'id'=>"pasajesadultos",
					'class'=>'form-control tienepopover numeroDeCupos',
					'data-container'=>'body',
					'data-toggle'=>'popover',
					'data-placement'=>'bottom',
					'data-content'=>'Ingrese Almenos un Adulto',
					'min'=>'0',
					'max'=>'50'
					)) !!}

			</div>
			<div class="col-xs-4">
				{!!Form::label('3eraEdad', 'Mayores: ', array('class' => 'control-label')); !!}

				{!! Form::input('number','mayores',Input::old('mayores',0),array(
					'id'=>"3eraEdad",
					'class'=>'form-control tienepopover numeroDeCupos',
					'data-container'=>'body',
					'data-toggle'=>'popover',
					'data-placement'=>'bottom',
					'data-content'=>'Ingrese Almenos un Adulto',
					'min'=>'0',
					'max'=>'50'
					)) !!}

			</div>

			<div class="col-xs-4">
				{!!Form::label('ninos', 'Niños: ', array('class' => 'control-label')); !!}

				{!! Form::input('number','ninos',Input::old('ninos',0),array(
					'id'=>"ninos",
					'class'=>'form-control numeroDeCupos',
					'min'=>'0',
					'max'=>'49'
					)) !!}

			</div>
		</div>
		<div class="col-xs-1">
			<button class="btn btn-success" id="validarCupos" type="button">
				<span class="glyphicon glyphicon-ok"></span>
			</button>
		</div>
	</div>
	<div class="clearfix"></div>
	@if($errors->has('adultos')||$errors->has('mayores')||$errors->has('ninos'))
		<ul class="alert alert-danger">
			@foreach($errors->all() as $error)
				@if ($errors->has('adultos')) <p class="help-block bg-danger text-center">{!!$errors->first('adultos')
				!!}</p> @endif
				@if ($errors->has('mayores')) <p class="help-block bg-danger text-center">{!!$errors->first
				('mayores') !!}</p> @endif
				@if ($errors->has('ninos')) <p class="help-block bg-danger text-center">{!!$errors->first('ninos')
				!!}</p> @endif

			@endforeach
		</ul>
	@endif
</div>
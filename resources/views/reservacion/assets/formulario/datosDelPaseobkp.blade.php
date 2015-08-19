<div class="form-group" id="datosDelPaseo">
	<div class="alert alert-success col-sm-12 col-xs-12" id="ayudaFecha"
	     role="alert">{!!Lang::get('formulario.SeleccionaUnaFecha')!!}</div>
	<div class="form-group" id="fechaform">
		{!! Form::label('fecha2', Lang::get('formulario.FechaDelPaseo'), array('class' => 'col-sm-3 col-xs-12 control-label')); !!}
		<div class="col-sm-8 col-xs-12">
			{!! Form::text('fecha2',Input::old('fecha2'),array(
				'id'=>"fecha2",
				'placeholder'=>'Fecha Del Paseo',
				'class'=>'form-control tienepopover',
				'data-container'=>'body',
				'data-toggle'=>'popover',
				'data-placement'=>'right',
				'data-content'=>Lang::get('formulario.SeleccioneFechaDelPaseo'))) !!}

			{!! Form::hidden('fecha',Input::old('fecha'),array('id'=>'fecha')) !!}
		</div>
		<div class="col-sm-1 col-xs-12 text-center"><span class="loading glyphicon
		glyphicon-refresh glyphicon-refresh-animate"></span></div>
		<div class="clearfix"></div>
		@if ($errors->has('fecha')) <p class="help-block bg-danger text-center">{{ $errors->first('fecha') }}</p> @endif
	</div>
	<div class="form-group" id="tipoEmbarcacion">
		<div class="alert alert-success col-sm-12 col-xs-12" id="ayudaEmbarcacion"
		     role="alert">{!!Lang::get('formulario.SeleccionDeEmbarcacionDisponible')!!}
		</div>
		<div class="form-group">
			<?php $width = floor(12 / $embarcaciones->count())?>
			{!! Form::label('embarcacion_id', Lang::get('formulario.Tipo De Embarcacion'), array('class' => 'col-sm-3 col-xs- control-label')) !!}
			<div id="opcionesDeEmbarcacion" class="btn-group col-sm-8 col-xs- " data-toggle="buttons">
				@foreach ($embarcaciones as $embarcacion)
					<label class="boat col-sm-{{ $width }} btn btn-primary disabled">
						{!! Form::radio('embarcacion_id', $embarcacion->id, false) !!}
						{!! Lang::get('formulario.'.$embarcacion->nombre) !!}
					</label>
				@endforeach
			</div>

			<div class="col-sm-1 col-xs-">
				<span class="loading glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>
			</div>
			<div class="clearfix"></div>
			@if ($errors->has('embarcacion_id')) <p class="help-block bg-danger text-center">{{ $errors->first
					('embarcacion_id') }}</p> @endif
		</div>
	</div>
	<?php $width = floor(12 / $paseos->count())?>
	<div class="form-group" id="horaform">
		<div class="alert alert-success col-sm-12 col-xs-12" id="ayudaPaseo" role="alert">Selecciona Uno de Nuestros
			Paseos
		</div>
		<div class="control-group">
			{!! Form::label('paseo_id', Lang::get('formulario.HorayDisponibilidad'), array('class' => 'col-sm-3 col-xs- control-label')) !!}
			<div id="opcionesHora" data-toggle="buttons" class="col-sm-8 col-xs- btn-group tienepopover"
			     data-content="Seleccione Hora del Paseo" data-original-title="" title="">
				@foreach ($paseos as $paseo)
					<label class="col-sm-{{ $width }} btn btn-primary botonhora disabled">
						{!! Form::radio('paseo_id',$paseo->id,false) !!}
						{!! $paseo->horaDeSalida!!}
						<br/><span class="cupos"></span>
					</label>
				@endforeach
			</div>
			<div class="col-sm-1 col-xs-">
				<span class="loading glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>
			</div>
			<div class="clearfix"></div>


			@if ($errors->has('paseo_id')) <p class="help-block bg-danger text-center">{!! $errors->first('paseo_id')
				!!}</p> @endif
		</div>
	</div>
</div>
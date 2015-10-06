<div class="col s12 m6">
	<div class="card blue-grey darken-3">
		<div class="card-content white-text">
			<span class="card-title">Datos del Paseo</span>
			<span class="badge">
				Cupos Disponibles En Paseo sin esta reserva: 
				<span id="cuposdisp">
					{!!$cuposDisponibles!!}
				</span>
			</span>


			<div class="col s12">
				{!! Form::horizontalModel($reserva,['route'=>'modificarPaseo','id'=>'modificarPaseo']) !!}
				{!!Form::hidden('disponibles',$cuposDisponibles)!!}
				{!!Form::hidden('id')!!}
				{!!Form::hidden('modificadoPor',Auth::user()->nombre)!!}
				{{-- {!!Form::hidden('fecha',null,['id'=>'fecha'])!!} --}}
				<div class="col s12">
					{!! Form::label('fecha', 'Fecha: ')!!}
					{!! Form::date('fecha') !!}
				</div>
				<div class="col s12">

					{!! Form::label('embarcacion_id', 'Embarcacion: ')!!}
					{!! Form::select('embarcacion_id',$embarcaciones,null,['class'=>'form-control']) !!}
				</div>
				<div class="col s12">
					{!! Form::label('paseo_id', 'Hora: ') !!}
					{!! Form::select('paseo_id',$paseos,null,['class'=>'form-control']) !!}
				</div>
				<div class="col s12">
					{!! Form::label('adultos', 'Adultos: ') !!}
					{!! Form::number('adultos',null,['class'=>'pasajes'])!!}
				</div>
				<div class="col s12">
					{!!Form::label('mayores', 'Mayores: ') !!}
					{!! Form::number('mayores',null,['class'=>'pasajes']) !!}
				</div>
				<div class="col s12">
					{!! Form::label('ninos', 'Niños: ')!!}
					{!!Form::number('ninos',null,['class'=>'pasajes'])!!}
				</div>
			</div>
			
		</div>
		<div class="clearfix"></div>
		<div class="card-action">
			<div class="center-align">
				{!!Form::Reset('Borrar Cambios',['class'=>'btn btn-warning'])!!}
				{!! Button::success('Modificar Info')->addAttributes(['id'=>'modificarReserva'])->submit()!!}
				{!!Form::close()!!}
			</div>
		</div>
	</div>
</div>
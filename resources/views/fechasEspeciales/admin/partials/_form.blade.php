{!!	ControlGroup::generate(
	Form::label('fecha', 'Fecha del Paseo: '),
	Form::text('fecha',null,['class'=>"datePicker"])
	)!!}

{!! ControlGroup::generate(
	Form::label('clase', 'Clase: '),
	Form::text('clase')
	) !!}
{!! ControlGroup::generate(
	Form::label('descripcion', 'Descripcion del Paseo: '),
	Form::textarea('descripcion')
	)	!!}
	@foreach($embarcaciones as $id=>$embarcacion)
	<div class="checkbox">
		
		{!!	ControlGroup::generate(
			Form::label('embarcacion_'.$id, $embarcacion.': '),
			Form::checkbox('embarcacion_'.$id,1,null,['class'=>'btswitch'])
			) !!}
		</div>
	@endforeach
{!!	ControlGroup::generate(
	Form::label('lista_de_embarcaciones', 'Embarcaciones: '),
	Form::select('lista_de_embarcaciones[]',$embarcaciones,null,['class'=>'form-control','multiple'])
	)		!!}
{!!	ControlGroup::generate(
	Form::label('lista_de_paseos', 'Paseos: '),
	Form::select('lista_de_paseos[]',$paseos,null,['class'=>'form-control','multiple'])
	)	!!}
	<div class="checkbox">
		{!!Form::hidden('trabaja',0)!!}
		{!!	ControlGroup::generate(
			Form::label('Trabaja', 'Tipo de Fecha Especial: '),
			Form::checkbox('trabaja',1,null,['class'=>'btswitch'])
			) !!}
		</div>
		{!!Button::primary($submit)->large()->block()->submit()!!}

	</div>

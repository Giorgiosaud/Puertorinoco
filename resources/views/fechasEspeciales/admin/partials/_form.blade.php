
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
	
{!!	ControlGroup::generate(
	Form::label('lista_de_embarcaciones', 'Embarcaciones Activas En la Fecha: '),
	Form::select('lista_de_embarcaciones[]',$embarcaciones,null,['class'=>'form-control','multiple'])
	)		!!}
{!!	ControlGroup::generate(
	Form::label('lista_de_paseos', 'Paseos Activos en la Fecha: '),
	Form::select('lista_de_paseos[]',$paseos,null,['class'=>'form-control','multiple'])
	)	!!}
	<div class="checkbox">
		{!!Form::hidden('trabaja',1)!!}
	</div>
	{!!Button::primary($submit)->large()->block()->submit()!!}

</div>

{!!
		ControlGroup::generate(
		Form::label('fecha', 'Fecha del Paseo: '),
		Form::text('fecha')
		)
		!!}
{!!
ControlGroup::generate(
Form::label('clase', 'Clase: '),
Form::text('clase')
)
!!}
{!!
		ControlGroup::generate(
		Form::label('descripcion', 'Descripcion del Paseo: '),
		Form::textarea('descripcion')
		)
!!}
{!!
ControlGroup::generate(
Form::label('lista_de_embarcaciones', 'Embarcaciones: '),
Form::select('lista_de_embarcaciones[]',$embarcaciones,null,['class'=>'form-control','multiple'])
)
!!}
	{!!Button::primary($submit)->large()->block()->submit()!!}

</div>

{!!
	ControlGroup::generate(
		Form::label('nombre', 'Nombre de Variable: '),
		Form::text('nombre',null,[$name])

	)
	!!}

	{!!
		ControlGroup::generate(
			Form::label('valor', 'Valor: '),
			Form::text('valor')
		)
		!!}

		{!!Button::primary($submit)->large()->block()->submit()!!}

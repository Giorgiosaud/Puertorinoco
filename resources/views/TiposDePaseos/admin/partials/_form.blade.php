{!!
	ControlGroup::generate(
		Form::label('nombre', 'Nombre del Tipo de Paseo Paseo: '),
		Form::text('nombre')
		)
		!!}

		{!!
			ControlGroup::generate(
				Form::label('descripcion', 'Descripcion del Paseo: '),
				Form::textarea('descripcion')
				)
				!!}
			</div>
			{!!Button::primary($submit)->large()->block()->submit()!!}

		</div>

{!!
	ControlGroup::generate(
		Form::label('dateFake', 'Fecha del Paseo: '),
		Form::text('dateFake',null,['class'=>"dateFake"])
		)
		!!}
		{!!
	ControlGroup::generate(
		Form::label('date', 'Fecha del Paseo: '),
		Form::text('date',null,['class'=>"date"])
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
								<div class="checkbox">
									{!!Form::hidden('trabaja',0)!!}
									{!!
										ControlGroup::generate(
											Form::label('Trabaja', 'Tipo de Fecha Especial: '),
											Form::checkbox('trabaja',1,null,['class'=>'btswitch'])
											)
											!!}
										</div>
										{!!Button::primary($submit)->large()->block()->submit()!!}

									</div>

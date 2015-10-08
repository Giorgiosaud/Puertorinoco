{!!
	Navbar::fixed()
	->fluid()
	->withBrand('<img class="logoNav" src="'.Vari::get('logo').'"/>', '#')
	->withContent(
		Navigation::links(
			[
			[
			'link' => '/PanelAdministrativo',
			'title' => 'Inicio'
			],
			['Configuracion',
			[

			[
			'link' => '#Embarcaciones',
			'title' => 'Embarcaciones'
			],
			[
			'link' => URL::route('PanelAdministrativo.paseos.index'),
			'title' => 'Paseos'
			],
			[
			'link' => URL::route('PanelAdministrativo.fechasEspeciales.index'),
			'title' => 'Fechas Especiales'
			],
			[
			'link' => URL::route('PanelAdministrativo.precios.index'),
			'title' => 'Precios'
			],
			]
			],
			['Reservas',
			[
			[
			'link'=>URL::route('formularioDeConsultaDeReserva'),
			'title'=>'Consultar'
			],
				//[
				//	'link'=>URL::route('formularioDeConsultaDeAbordaje'),
				//	'title'=>'Abordaje'
				//],

			]
			],
			]
			)
		)
	->withContent(
		Navigation::links(
			[
			[
			'link'=>URL::route('logout'),
			'title'=>'Desconectarse',
			],
			]
			)->right()
		)
	!!}
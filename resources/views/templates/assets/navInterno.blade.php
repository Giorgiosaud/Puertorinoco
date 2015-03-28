{!!
Navbar::top()
->setType('navbar-puertorinoco')
->fluid()
->withBrand('<img class="logoNav" src="'.Vari::get('logo').'"/>', '#')
->withContent(
	Navigation::links(
		[
			[
					'link' => URL::route('loginPanel'),
					'title' => 'Inicio'
				],
			['Configuracion',
			[

				[
					'link' => URL::route('PanelAdministrativo.embarcaciones.index'),
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
			]
			],
			['Reservas',
			[
				[
					'link'=>URL::route('formularioDeConsultaDeReserva'),
					'title'=>'Consultar'
				],
				[
					'link'=>URL::route('formularioDeConsultaDeAbordaje'),
					'title'=>'Abordaje'
				],

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
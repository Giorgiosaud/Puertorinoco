{!!
Navbar::top()
->setType('navbar-puertorinoco')
->fluid()
->withBrand('<img class="logoNav" src="'.$logo->valor.'"/>', '#')
->withContent(
	Navigation::links(
		[
			[
				'link' => URL::route('inicio.index'),
				'title' => 'Inicio'
			],
		]
	)
)
!!}
{!!
Navbar::top()
->puertorinoco()
->fluid()
->withBrand('Puertorinoco Catamaran', '#')
->withContent(
	Navigation::links(
		[
			[
				'link' => '#',
				'title' => 'Home'
			],
			[
				'link' => '#',
				'title' => 'Link'
			],
			[
				'link' => '#',
				'title' => 'Link'
			],
			[
				'link' => '#',
				'title' => 'Link'
			],
		]
	)
)
!!}
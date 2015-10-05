{!!
Navbar::fixed()
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

{{--

<ul id="configuraciones" class="dropdown-content">
    <li><a href="{{URL::route('PanelAdministrativo.embarcaciones.index') }}">Embarcaciones</a></li>
    <li><a href="{{URL::route('PanelAdministrativo.paseos.index')}}">Paseos</a></li>
    <li><a href="{{ URL::route('PanelAdministrativo.fechasEspeciales.index')}}">Fechas Especiales</a></li>
    <li><a href="{{URL::route('PanelAdministrativo.precios.index')}}">Precios</a></li>
</ul>


<ul id="reservas" class="dropdown-content">
    <li><a href="{{URL::route('formularioDeConsultaDeReserva')}}">Consultar</a></li>
</ul>


<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo"><img class="logoNav" src="{!! Vari::get('logo')!!}"/></a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="{{ URL::route('inicio.index') }}">Inicio</a></li>
                <li><a class="dropdown-button" href="#!" data-activates="configuraciones">Configuracion<i
                                class="material-icons right">arrow_drop_down</i></a></li>
                <li><a class="dropdown-button" href="#!" data-activates="reservas">Reservas<i
                                class="material-icons right">arrow_drop_down</i></a></li>
                <li><a href="{{URL::route('logout') }}">Desconectarse</a></li>
            </ul>
            <ul id="mobile-demo" class="side-nav">
                <li><a href="{{ URL::route('inicio.index') }}">Inicio</a></li>
                <ul id="configuraciones" class="dropdown-content">
                    <li><a href="{{URL::route('PanelAdministrativo.embarcaciones.index') }}">Embarcaciones</a></li>
                    <li><a href="{{URL::route('PanelAdministrativo.paseos.index')}}">Paseos</a></li>
                    <li><a href="{{ URL::route('PanelAdministrativo.fechasEspeciales.index')}}">Fechas Especiales</a></li>
                    <li><a href="{{URL::route('PanelAdministrativo.precios.index')}}">Precios</a></li>
                </ul>


                <ul id="reservas" class="dropdown-content">
                    <li><a href="{{URL::route('formularioDeConsultaDeReserva')}}">Consultar</a></li>
                </ul>
                                class="material-icons right">arrow_drop_down</i></a></li>
                <li><a href="{{URL::route('logout') }}">Desconectarse</a></li>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            </ul>
        </div>
    </nav>
</div>--}}
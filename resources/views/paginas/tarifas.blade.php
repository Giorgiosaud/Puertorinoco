@extends('templates.mainSinNav')
@section('content')

<div class="container">


	<h1>{{Lang::get('tarifas.Titulo')}}</h1>
	@foreach ($TiposDePaseos as $tipoDePaseo)
	<h2>{{Lang::get('tarifas.PaseosDe',array('horas'=>$tipoDePaseo->nombre))}} </h2>
	<span> {{Lang::get('tarifas.horasDeSalida')}}:
		<ul>

			@foreach($tipoDePaseo->paseos as $paseo)
			<li>{{$paseo->horaDeSalida}}</li>
			@endforeach
		</ul>
	</span>
	<span> {{Lang::get('tarifas.Precios')}}:
		<ul>
			@foreach($tipoDePaseo->precios()->PrecioParaLaFecha($fecha) as $paseoconPrecio)
			<li>{{Lang::get('tarifas.Adultos')}} {{$paseoconPrecio->adulto}}</li>
			<li>{{Lang::get('tarifas.Mayores')}} {{$paseoconPrecio->mayor}}</li>
			<li>{{Lang::get('tarifas.Ninos')}} {{$paseoconPrecio->nino}}</li>
			@endforeach
			<li>{{Lang::get('tarifas.NinosGratis')}}</li>
		</ul>
		@endforeach	
	</span>
	
	<p>
		<strong>{{Lang::get('tarifas.bottom')}} </strong>
	</p>

	<h3>{{Lang::get('tarifas.clubTitulo')}}</h3>

	<h4>{{Lang::get('tarifas.Talta')}}:</h4>
	<ul>
		<li>{{Lang::get('tarifas.Adultos')}} {!!Vari::get('adultosPagoClubTemporadaAlta')!!}</li>
		<li>{{Lang::get('tarifas.Mayores')}} {!!Vari::get('ninosymayoresPagoClubTemporadaAlta')!!}</li>
		<li>{{Lang::get('tarifas.Ninos')}} {!!Vari::get('ninosymayoresPagoClubTemporadaAlta')!!}</li>
	</ul>
	<h4>{{Lang::get('tarifas.Tbaja')}}:</h4>
	<ul>
		<li>{{Lang::get('tarifas.Adultos')}} {!!Vari::get('adultosPagoClubTemporadaBaja')!!}</li>
		<li>{{Lang::get('tarifas.Mayores')}} {!!Vari::get('ninosymayoresPagoClubTemporadaBaja')!!}</li>
		<li>{{Lang::get('tarifas.Ninos')}} {!!Vari::get('ninosymayoresPagoClubTemporadaBaja')!!}</li>
	</ul>
</div>
@endsection

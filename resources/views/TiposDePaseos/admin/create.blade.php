@extends('templates.mainInterno')
@section('content')
	@include('templates.errors')
	<div class="container">
		<h1>Crear Tipo de Paseo</h1>
		{!!Form::horizontal(['url'=>URL::route('PanelAdministrativo.tipoDePaseo.store'),'role'=>'form'])!!}
		@include('Paseos.admin.partials._form',['submit'=>'Crear Tipo de Paseo'])
		{!!Form::close()!!}

	</div>
@endsection
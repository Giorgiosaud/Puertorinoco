@extends('templates.mainInterno')
@section('content')
	@include('templates.errors')
	<div class="container">
		<h1>Crear Paseo</h1>
		{!!Form::horizontal(['url'=>URL::route('PanelAdministrativo.paseos.store'),'role'=>'form'])!!}
		@include('Paseos.admin.partials._form',['submit'=>'Crear Paseo'])
		{!!Form::close()!!}

	</div>
@endsection
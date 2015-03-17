@extends('templates.mainInterno')
@section('content')
	@include('templates.errors')
	<div class="container">
		<h1>Crear Embarcacion</h1>
		{!!Form::horizontal(['url'=>URL::route('PanelAdministrativo.embarcaciones.store'),'role'=>'form'])!!}
		@include('embarcaciones.admin.partials._form',['submit'=>'Crear Embarcacion'])
		{!!Form::close()!!}

	</div>
@endsection
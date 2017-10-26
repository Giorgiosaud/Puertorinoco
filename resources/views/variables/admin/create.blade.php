@extends('templates.mainInterno')
@section('content')
	@include('templates.errors')
	<div class="container">
		<h1>Crear Variable</h1>
		{!!Form::horizontal(['url'=>URL::route('PanelAdministrativo.variables.store'),'role'=>'form'])!!}
		@include('variables.partials._form',['submit'=>'Crear Variable'])
		{!!Form::close()!!}

	</div>
@endsection
@section('footer')
@endsection

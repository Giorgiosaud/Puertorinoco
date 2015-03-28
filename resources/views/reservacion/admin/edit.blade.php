@extends('templates.mainInterno')
@section('content')
	<div class="container">

		@include('reservacion.admin.partials.formulario')
	</div>
@endsection
@section('footer')
	@include('reservacion.admin.partials.scriptsEditarReserva')
@endsection
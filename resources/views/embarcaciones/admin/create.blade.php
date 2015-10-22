@extends('templates.mainInterno')
@section('content')
	@include('templates.errors')
		{!!Form::horizontal(['url'=>URL::route('PanelAdministrativo.embarcaciones.store'),'role'=>'form'])!!}
		@include('embarcaciones.admin.partials._form',['submit'=>'Crear Embarcacion','titulo'=>'Nueva Embarcacion'])
		{!!Form::close()!!}

@endsection
@extends('templates.mainInterno')
@section('content')
	@include('templates.errors')
	<div class="container">
		<h1>Editar {!!$embarcacion->nombre!!}</h1>
		{!!Form::horizontalModel($embarcacion,['url'=>URL::route('PanelAdministrativo.embarcaciones.update',$embarcacion->id),'role'=>'form','method'=>'PUT'])!!}
		@include('embarcaciones.admin.partials._form',['submit'=>'Modificar Embarcacion'])
		{!!Form::close()!!}
	</div>
@endsection
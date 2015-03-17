@extends('templates.mainInterno')
@section('content')
	@include('templates.errors')
	<div class="container">
		<h1>Editar {!!$paseo->nombre!!}</h1>
		{!!Form::horizontalModel($paseo,['url'=>URL::route('PanelAdministrativo.paseos.update',$paseo->id),'role'=>'form','method'=>'PUT'])!!}
		@include('fechasEspeciales.admin.partials._form',['submit'=>'Modificar Paseo'])
		{!!Form::close()!!}
	</div>
@endsection
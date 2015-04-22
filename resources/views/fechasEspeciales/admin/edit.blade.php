@extends('templates.mainInterno')
@section('content')
	@include('templates.errors')
	<div class="container">
		<h1>Editar {!!$fechaEspecial->nombre!!}</h1>
		{!!Form::horizontalModel($fechaEspecial,['url'=>URL::route('PanelAdministrativo.fechasEspeciales.update',$fechaEspecial->id),'role'=>'form','method'=>'PUT'])!!}
		@include('fechasEspeciales.admin.partials._form',['submit'=>'Modificar Fecha'])
		{!!Form::close()!!}
	</div>
@endsection
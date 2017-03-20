@extends('templates.mainInterno')
@section('content')
	@include('templates.errors')
	<div class="container">
		<h1>Editar {!!$TipoDePaseo->nombre!!}</h1>
		{!!Form::horizontalModel($TipoDePaseo,['url'=>URL::route('PanelAdministrativo.paseos.update',$TipoDePaseo->id),'role'=>'form','method'=>'PUT'])!!}
		@include('TiposDePaseos.admin.partials._form',['submit'=>'Modificar Paseo'])
		{!!Form::close()!!}
	</div>
@endsection
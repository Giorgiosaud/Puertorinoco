@extends('templates.mainSinNav')
@section('content')
	@foreach($respuestas as $embarcacion)
	{{$embarcacion}}</br>

	@endforeach
@endsection
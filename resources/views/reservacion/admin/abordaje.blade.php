@extends('templates.mainInterno')
@section('content')
	@include('templates.errors')
	<h1>
		Realizar Abordaje:
	</h1>
	{!! Form::open(['id'=>'consultarReserva']) !!}

	{!!
	ControlGroup::generate(
	Form::label('fecha2', 'Fecha del Paseo: '),
	Form::text('fecha2',null,[
				'id'=>"fecha2",
				])
	)
	!!}

	{!!
	ControlGroup::generate(
		Form::label('horas', 'Hora(s): '),
		Form::select('horas[]',$paseos,null,['class'=>'form-control','multiple'])
	)
	!!}
	{!!
	ControlGroup::generate(
		Form::label('embarcaciones', 'Embarcacion(es): '),
		Form::select('embarcaciones[]',$embarcaciones,null,['class'=>'form-control','multiple'])
	)
	!!}

	{!! Form::hidden('fecha',null,array('id'=>'fecha')) !!}
	{!!Button::primary('Consultar')->large()->block()->submit()!!}
	{!!Form::close()!!}

@endsection
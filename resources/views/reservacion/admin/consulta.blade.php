@extends('templates.mainInterno')
@section('content')
@include('templates.errors')
<h1>
    Consultar Reserva:
</h1>
{!! Form::openMat(['id'=>'consultarReserva','method'=>'GET','url'=>route('consultarReservas')]) !!}
<div class="row">
    {!! ControlGroup::generate(Form::label('numero_de_reserva', 'Escriba el Numero de Reserva que Busca: '), Form::text('numero_de_reserva'))!!}
</div>
<div class="row">
    {!! ControlGroup::generate(Form::label('nombreoapellido', 'Escriba el Nombre o apellido que busca: '),Form::text('nombreoapellido'))!!}
</div>
<div class="row">
    {!! ControlGroup::generate( Form::label('fecha2', 'Fecha del Paseo: '), Form::datePast('fecha2',null,[ 'id'=>"fecha2"]))!!}
</div>
<div class="row">
    {!! Form::label('horas', 'Hora(s): ') !!}
    {!! Form::select('horas[]',$paseos,false,['class'=>'multiselector browser-default','multiple']) !!}
</div>
<div class="row">
    {!! Form::label('embarcaciones', 'Embarcacion(es): ')!!}
    {!! Form::select('embarcaciones[]',$embarcaciones,false,['class'=>'multiselector browser-default','multiple']) !!}
</div>
<div class="row">
    {!! Form::hidden('fecha',null,array('id'=>'fecha')) !!}
    {!!Button::primary('Consultar')->large()->block()->submit()!!}
</div>
{!!Form::close()!!}
@endsection
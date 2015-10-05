@extends('templates.mainInterno')
@section('content')
    @include('templates.errors')
    <h1>
        Consultar Reserva:
    </h1>
    {!! Form::openMat(['id'=>'consultarReserva','method'=>'GET','url'=>route('consultarReservas')]) !!}
    <div class="row">
        {!!
    ControlGroup::generate(
        Form::label('numero_de_reserva', 'Escriba el Numero de Reserva que Busca: '),
        Form::text('numero_de_reserva')
    )
    !!}
    </div>
    <div class="row">
    {!!
ControlGroup::generate(
Form::label('nombreoapellido', 'Escriba el Nombre o apellido que busca: '),
Form::text('nombreoapellido')
)
!!}
    </div>
    <div class="row">
    {!!
    ControlGroup::generate(
    Form::label('fecha2', 'Fecha del Paseo: '),
    Form::date('fecha2',null,[
                'id'=>"fecha2",
                'class'=>'admin'
                ])
    )
    !!}
    </div>
    {!!
Form::label('horas', 'Hora(s): ')!!}
    {!!
Form::select('horas[]',$paseos,true,['class'=>'multiselector browser-default','multiple'])
!!}
    {!!
Form::label('embarcaciones', 'Embarcacion(es): ')!!}{!!
Form::select('embarcaciones[]',$embarcaciones,true,['class'=>'multiselector browser-default','multiple'])
!!}

    {!! Form::hidden('fecha',null,array('id'=>'fecha')) !!}
    {!!Button::primary('Consultar')->large()->block()->submit()!!}
    {!!Form::close()!!}

@endsection
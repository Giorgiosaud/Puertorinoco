@extends('templates.mainInterno')
@section('content')
    @include('templates.errors')
    <h1>
        Consultar Reserva:
    </h1>
    {!! Form::open(['id'=>'consultarReserva','method'=>'GET','url'=>route('consultarReservas')]) !!}
    {!!
ControlGroup::generate(
Form::label('numero_de_reserva', 'Escriba el Numero de Reserva que Busca: '),
Form::text('numero_de_reserva')
)
!!}
    {!!
ControlGroup::generate(
Form::label('nombreoapellido', 'Escriba el Nombre o apellido que busca: '),
Form::text('nombreoapellido')
)
!!}
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
